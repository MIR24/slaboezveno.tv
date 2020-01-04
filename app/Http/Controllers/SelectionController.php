<?php

namespace App\Http\Controllers;

use App\Exceptions\SelectionAlreadyFilledProfileException;
use App\Exceptions\SelectionBlockedException;
use App\Service\Selection\SelectionRunner;
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

            # TODO просроченный вопрос?

            return view('selection.question', [
                'question' => $passing->question,
                # TODO номер вопроса
            ]);
        } catch (SelectionBlockedException $e) {
            return view('selection.answer_incorrect');
        } catch (SelectionAlreadyFilledProfileException $e) {
            return view('selection.profile_success');
        }
    }

    public function giveAnswer()
    {
        # TODO
        # return view('selection.answer_incorrect');
    }
}
