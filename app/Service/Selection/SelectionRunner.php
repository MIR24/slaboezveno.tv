<?php


namespace App\Service\Selection;


use App\Entity\SelectionBlocked;
use App\Entity\SelectionPassing;
use App\Entity\SelectionProfile;
use App\Entity\User;
use App\Exceptions\SelectionException;


class SelectionRunner
{
    /**
     * @param User $user
     * @return SelectionPassing|null
     * @throws SelectionException
     */
    public function getCurrentPassing(User $user): ?SelectionPassing
    {
        $profile = SelectionProfile::whereUserId($user->getId())->first();
        if ($profile) {
            throw new SelectionException(SelectionException::MESSAGE_FILLED_PROFILE);
        }

        $blocked = SelectionBlocked::whereUserId($user->getId())->first();
        if ($blocked) {
            throw new SelectionException(SelectionException::MESSAGE_BLOCKED_24_HOUR);
        }

        $passing = SelectionPassing::with('question')
            ->whereUserId($user->getId())
            ->whereAnsweredAt(null)
            ->orderBy('questions_started_at', 'DESC')
            ->first();
//        if ($passing === null) {
//            throw new \Exception('TODO not found current question');
//        }

        // TODO проверить оставшееся время тут или в вызывающем?

        return $passing;
    }

    /**
     * @param User $user
     * @return SelectionPassing
     * @throws SelectionException
     * @throws \Exception
     */
    public function getNextQuestion(User $user): SelectionPassing
    {
        $profile = SelectionProfile::whereUserId($user->getId())->first();
        if ($profile) {
            throw new SelectionException(SelectionException::MESSAGE_FILLED_PROFILE);
        }

        $blocked = SelectionBlocked::whereUserId($user->getId())->first();
        if ($blocked) {
            throw new SelectionException(SelectionException::MESSAGE_BLOCKED_24_HOUR);
        }

        // TODO проверить есть ли неотвеченный вопрос?

        $question = null; # TODO next question

        $passing = new SelectionPassing([
            'user_id' => $user->getId(),
            'question_id' => $question->id,
            'answered_at' => null,
            'questions_started_at' => null # TODO find created_at of first question
        ]);

        if (!$passing->save()) {
            throw new \Exception('TODO no created SelectionPassing');
        }

        return $passing;
    }

    public function answer(User $user, string $textAnswer) # TODO  question?
    {
        # TODO
    }
}
