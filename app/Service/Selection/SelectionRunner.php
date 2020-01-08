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


class SelectionRunner
{
    public const INTERVAL_BETWEEN_EXAMINATION = 24 * 3600; # TODO in view const = 24 hours
    public const INTERVAL_ANSWER_TIME = 20; # TODO in view const = 20 seconds

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

        // TODO проверить есть ли неотвеченный вопрос?

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

        $passing = new SelectionPassing([
            'user_id' => $user->getId(),
            'question_id' => $question->id,
//            'answered_at' => null,
//            'questions_started_at' => null # TODO find created_at of first question
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
    public function checkAnswer(User $user, string $textAnswer): bool # TODO next_stage?
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

    private function mb_strcasecmp($str1, $str2, $encoding = null)
    {
        if (null === $encoding) {
            $encoding = mb_internal_encoding();
        }
        return strcmp(mb_strtoupper($str1, $encoding), mb_strtoupper($str2, $encoding));
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
        if ($passing->created_at < new \DateTimeImmutable("now - " . self::INTERVAL_ANSWER_TIME . " seconds")) {
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
    }
}
