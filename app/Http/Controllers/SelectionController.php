<?php

namespace App\Http\Controllers;

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
        $user = Auth::user();
        try {
            $passing = $selectionRunner->getCurrentPassing($user);
            if (!$passing) {
                $passing = $selectionRunner->getNextPassing($user);
            }

            return view('selection.question', [
                'question' => $passing->question,
                # TODO номер вопроса
            ]);
        } catch (SelectionLateAnswerException $e) {
            return view('selection.answer_incorrect');
        } catch (SelectionBlockedException $e) {
            return view('selection.answer_incorrect');
        } catch (SelectionAlreadyFilledProfileException $e) {
            return view('selection.profile_success');
        }
    }

    public function giveAnswer(Request $request, SelectionRunner $selectionRunner)
    {
        $user = Auth::user();
        try {
            $answer = $request->get("answer1");
            if (!$selectionRunner->checkAnswer($user, $answer)) {
                return view('selection.answer_incorrect');
            }
            # TODO анкета или вопрос
        } catch (SelectionLateAnswerException $e) {
            return view('selection.answer_incorrect');
        } catch (SelectionBlockedException $e) {
            return view('selection.answer_incorrect');
        } catch (SelectionAlreadyFilledProfileException $e) {
            return view('selection.profile_success');
        }
    }
}
