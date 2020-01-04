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

Route::group(['middleware' => ['auth']], function () {
    Route::get('/selection/get_question', 'SelectionController@getQuestion')->name("selection.getQuestion");
    Route::get('/selection/give_answer', 'SelectionController@giveAnswer')->name("selection.giveAnswer"); # TODO post
    Route::get('/selection/get_profile', 'SelectionController@getProfile');
    Route::post('/selection/fill_profile', 'SelectionController@fillProfile');
});


Route::get('/selection/answer_incorrect', function () {
    return view('selection.answer_incorrect');
});
Route::get('/selection/answers_correct', function () {
    return view('selection.answers_correct');
});
Route::get('/selection/profile', function () {
    return view('selection.profile');
});
Route::get('/selection/profile_success', function () {
    return view('selection.profile_success');
});
