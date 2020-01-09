<?php

namespace App\Http\Controllers;

use App\Entity\SelectionProfile;
use App\Entity\User;
use App\Exceptions\SelectionAlreadyFilledProfileException;
use App\Exceptions\SelectionBlockedException;
use App\Exceptions\SelectionLateAnswerException;
use App\Service\Selection\SelectionRunner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SelectionController extends Controller
{
    public function getQuestion(SelectionRunner $selectionRunner)
    {
        /** @var User $user */
        $user = Auth::user();
        try {
            $passing = $selectionRunner->getCurrentPassing($user);

            if ($selectionRunner->isAllowedProfile($user)) {
                return redirect()->route('selection.getProfile');
            }

            if (!$passing) {
                $passing = $selectionRunner->getNextPassing($user);
            }

            return view('selection.question', [
                'question' => $passing->question,
                'currentQuestionNumber' => $selectionRunner->getNumberOfQuestionsInCurrentExamination($user)
            ]);
        } catch (SelectionLateAnswerException $e) {
            return redirect()->route('selection.failedAnswer');
        } catch (SelectionBlockedException $e) {
            return redirect()->route('selection.blocked');
        } catch (SelectionAlreadyFilledProfileException $e) {
            return redirect()->route('selection.filledProfile');
        }
    }

    public function giveAnswer(Request $request, SelectionRunner $selectionRunner)
    {
        /** @var User $user */
        $user = Auth::user();
        try {
            $answer = $request->get("answer1");
            if (!$selectionRunner->checkAnswer($user, $answer??'')) {
                return redirect()->route('selection.failedAnswer');
            }

            if ($selectionRunner->isAllowedProfile($user)) {
                # TODO а если профиль заполнен?
                return redirect()->route('selection.successAnswers');
            }

            return redirect()->route('selection.getQuestion');
        } catch (SelectionLateAnswerException $e) {
            return redirect()->route('selection.failedAnswer');
        } catch (SelectionBlockedException $e) {
            return redirect()->route('selection.blocked');
        } catch (SelectionAlreadyFilledProfileException $e) {
            return redirect()->route('selection.filledProfile');
        }
    }

    public function getProfile(SelectionRunner $selectionRunner)
    {
        /** @var User $user */
        $user = Auth::user();
        try {
            if (!$selectionRunner->isAllowedProfile($user)) {
                return redirect()->route('selection.getQuestion');
            }

            # TODO if filled profile

            return view('selection.profile');
        } catch (SelectionBlockedException $e) {
            return redirect()->route('selection.blocked');
        } catch (SelectionAlreadyFilledProfileException $e) {
            return redirect()->route('selection.filledProfile');
        }
    }

    public function fillProfile(Request $request, SelectionRunner $selectionRunner)
    {
        /** @var User $user */
        $user = Auth::user();
        try {
            if (!$selectionRunner->isAllowedProfile($user)) {
                return redirect()->route('selection.getQuestion');
            }

            # TODO if filled profile: exception or update?

            # TODO сделать валидацию
            $profile = new SelectionProfile(
                $request->only((new SelectionProfile())->getFillable())
            );
            if ($profile->patronymic === null) {
                $profile->patronymic = '';
            }
            $profile->user_id = $user->getId();
            $profile->save();

            # TODO менять осторожно или сделать 2 email (User/SelectionProfile)
            $user->email = $request->get('contact_email');
            $user->save();

            return redirect()->route('selection.filledProfile');
        } catch (SelectionBlockedException $e) {
            return redirect()->route('selection.blocked');
        } catch (SelectionAlreadyFilledProfileException $e) {
            return redirect()->route('selection.filledProfile');
        }
    }
}
