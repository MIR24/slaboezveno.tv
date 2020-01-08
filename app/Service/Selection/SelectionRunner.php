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


class SelectionRunner
{
    public const INTERVAL_BETWEEN_EXAMINATION = 24 * 3600; # TODO in view const = 24 hours

    /**
     * @param User $user
     * @return SelectionPassing|null
     * @throws SelectionAlreadyFilledProfileException
     * @throws SelectionBlockedException
     */
    public function getCurrentPassing(User $user): ?SelectionPassing
    {
        $this->validateAccess($user);

        $passing = SelectionPassing::with('question')
            ->whereUserId($user->getId())
            ->whereAnsweredAt(null)
            ->orderBy('questions_started_at', 'DESC')
            ->first();

        // TODO проверить оставшееся время тут или в вызывающем?

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
        if ($blocked) {
            throw new SelectionBlockedException();
        }

    }

    private function closeAfterSuccessAnswer(SelectionPassing $passing): void
    {
        $passing->answered_at = new \DateTimeImmutable("now");
        $passing->save();
    }

    private function closeAfterFailAnswer(SelectionPassing $passing): void
    {
        $passing->answered_at = new \DateTimeImmutable("now");
        $blocked = new SelectionBlocked(['user_id' => $passing->user_id]);

        $blocked->save();
        $passing->save();
    }
}
