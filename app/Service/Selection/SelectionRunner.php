<?php


namespace App\Service\Selection;


use App\Entity\SelectionBlocked;
use App\Entity\SelectionPassing;
use App\Entity\SelectionProfile;
use App\Entity\SelectionQuestion;
use App\Entity\User;
use App\Exceptions\SelectionAlreadyFilledProfileException;
use App\Exceptions\SelectionBlockedException;
use App\Exceptions\SelectionException;
use App\Exceptions\SelectionLateAnswerException;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;


class SelectionRunner
{
    public const INTERVAL_BETWEEN_EXAMINATION = 24 * 3600; # TODO in view const = 24 hours
    public const INTERVAL_ANSWER_TIME = 20; # TODO in view const = 20 seconds
    public const NUMBER_OF_ANSWERS_REQUIRED = 10; # TODO in view const = 10

    /**
     * @param User $user
     * @return SelectionPassing|null
     * @throws SelectionAlreadyFilledProfileException
     * @throws SelectionBlockedException
     * @throws SelectionLateAnswerException
     */
    public function getCurrentPassing(User $user): ?SelectionPassing
    {
        $this->validateAccess($user);

        $passing = SelectionPassing::with('question')
            ->whereUserId($user->getId())
            ->whereAnsweredAt(null)
            ->orderBy('questions_started_at', 'DESC')
            ->first();

        try {
            if ($passing) {
                $this->validatePassing($passing);
            }
        } catch (SelectionLateAnswerException $e) {
            $this->setBlock($passing->user);
            throw $e;
        }

        return $passing;
    }

    /**
     * @param User $user
     * @return SelectionPassing
     * @throws SelectionException
     * @throws \Exception
     */
    public function getNextPassing(User $user): SelectionPassing
    {
        $this->validateAccess($user);

        /** @var Collection $previousQuestions */
        $previousQuestions = SelectionPassing::whereUserId($user->getId())
            ->select(['question_id'])
            ->pluck('question_id');
        $question = SelectionQuestion::inRandomOrder()
            ->whereNotIn('id', $previousQuestions)
            ->limit(1)
            ->first();
        if (!$question) {
            throw new \Exception('TODO not found free question');
        }

        $examinationStartedAt = new \DateTimeImmutable("now");
        $lastPassing = SelectionPassing::whereUserId($user->getId())
            ->orderBy('created_at', 'DESC')
            ->limit(1)
            ->first();
        if ($lastPassing and $lastPassing->created_at > new \DateTimeImmutable("now - " . self::INTERVAL_ANSWER_TIME . " seconds")) {
            $examinationStartedAt = $lastPassing->questions_started_at;
        }

        $passing = new SelectionPassing([
            'user_id' => $user->getId(),
            'question_id' => $question->id,
            'questions_started_at' => $examinationStartedAt,
        ]);

        if (!$passing->save()) {
            throw new \Exception('TODO no created SelectionPassing');
        }

        return $passing;
    }

    /**
     * @param User $user
     * @param string $textAnswer
     * @return bool
     * @throws SelectionAlreadyFilledProfileException
     * @throws SelectionBlockedException
     * @throws SelectionLateAnswerException
     */
    public function checkAnswer(User $user, string $textAnswer): bool
    {
        $passing = $this->getCurrentPassing($user);
        if (!$passing) {
            throw new \Exception('TODO no found question');
        }

        if (0 === $this->mb_strcasecmp($textAnswer, $passing->question->answer)) {
            $this->closeAfterSuccessAnswer($passing);
            return true;
        }

        $this->closeAfterFailAnswer($passing);
        return false;
    }

    public function getNumberOfQuestionsInCurrentExamination(User $user): int
    {
        $lastGroupOfQuestions = SelectionPassing::whereUserId($user->getId())
            ->select('questions_started_at', DB::raw('count(*) as total'))
            ->groupBy('questions_started_at')
            ->orderBy('questions_started_at', 'DESC')
            ->limit(1)
            ->first();
        if ($lastGroupOfQuestions === null) {
            return 0;
        }

        return $lastGroupOfQuestions->total;
    }

    public function isAllowedProfile(User $user): bool
    {
        $lastGroupOfQuestions = SelectionPassing::whereUserId($user->getId())
            ->select('questions_started_at', DB::raw('count(*) as total'))
            ->groupBy('questions_started_at')
            ->orderBy('questions_started_at', 'DESC')
            ->limit(1)
            ->first();
        if ($lastGroupOfQuestions === null) {
            return false;
        }

        return ($lastGroupOfQuestions->total >= self::NUMBER_OF_ANSWERS_REQUIRED);
    }

    // TODO? public function isFilledProfile(User $user): bool


    private function mb_strcasecmp($str1, $str2, $encoding = null)
    {
        if (null === $encoding) {
            $encoding = mb_internal_encoding();
        }
        $filteredStr1 = preg_replace('/[^a-zа-яё\d]/ui', '', $str1);
        $filteredStr2 = preg_replace('/[^a-zа-яё\d]/ui', '', $str2);
        $filteredStr1 = preg_replace('/ё/ui', 'е', $filteredStr1);
        $filteredStr2 = preg_replace('/ё/ui', 'е', $filteredStr2);
        return strcmp(mb_strtoupper($filteredStr1, $encoding), mb_strtoupper($filteredStr2, $encoding));
    }

    /**
     * @param User $user
     * @throws SelectionAlreadyFilledProfileException
     * @throws SelectionBlockedException
     */
    private function validateAccess(User $user): void
    {
        $profile = SelectionProfile::whereUserId($user->getId())->first();
        if ($profile) {
            throw new SelectionAlreadyFilledProfileException();
        }

        $blocked = SelectionBlocked::whereUserId($user->getId())->first();
        if ($blocked and $blocked->created_at > new \DateTimeImmutable("now - " . self::INTERVAL_BETWEEN_EXAMINATION . " seconds")) {
            throw new SelectionBlockedException();
        }
    }

    /**
     * @param SelectionPassing $passing
     * @throws SelectionLateAnswerException
     */
    private function validatePassing(SelectionPassing $passing): void
    {
        $isLateAnswer = $passing->created_at < new \DateTimeImmutable("now - " . self::INTERVAL_ANSWER_TIME . " seconds");
        # TODO $isPreviousExaminationEnded ломается, если нет предыдущего отбора ( первый или очищен через clearQuestionsForUser)
//        $isPreviousExaminationEnded = $passing->questions_started_at < new \DateTimeImmutable("now - " . self::INTERVAL_BETWEEN_EXAMINATION . " seconds");
//        if ($isLateAnswer and !$isPreviousExaminationEnded) {
        if ($isLateAnswer) {
            $this->clearQuestionsForUser($passing->user);
            throw new SelectionLateAnswerException();
        }
    }

    private function closeAfterSuccessAnswer(SelectionPassing $passing): void
    {
        $passing->answered_at = new \DateTimeImmutable("now");
        $passing->save();
    }

    private function closeAfterFailAnswer(SelectionPassing $passing): void
    {
        $this->setBlock($passing->user);

        $passing->answered_at = new \DateTimeImmutable("now");
        $passing->save();
    }

    private function setBlock(User $user): void
    {
        $blocked = new SelectionBlocked(['user_id' => $user->getId()]);
        $blocked->save();

        $this->clearQuestionsForUser($user);
    }

    private function clearQuestionsForUser(User $user): void
    {
        SelectionPassing::whereUserId($user->getId())->delete();
    }
}
