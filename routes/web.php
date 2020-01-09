<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', function () {
    return view('home');
});

Route::group(['middleware' => ['auth']], function () { # TODO autocreate user in auth
    Route::get('/selection/get_question', 'SelectionController@getQuestion')->name("selection.getQuestion");
    Route::post('/selection/give_answer', 'SelectionController@giveAnswer')->name("selection.giveAnswer");
    Route::get('/selection/get_profile', 'SelectionController@getProfile')->name("selection.getProfile");
    Route::post('/selection/fill_profile', 'SelectionController@fillProfile')->name("selection.fillProfile");


    Route::get('/selection/failed_answer', function () {
        return view('selection.answer_incorrect');
    })->name("selection.failedAnswer");

    Route::get('/selection/blocked', function () {
        return view('selection.blocked');
    })->name("selection.blocked");

    Route::get('/selection/answers_correct', function () {
        return view('selection.answers_correct');
    })->name("selection.successAnswers");

    Route::get('/selection/filled_profile', function () {
        return view('selection.profile_success');
    })->name("selection.filledProfile");
});
