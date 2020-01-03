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

Route::get('/', function () {
    return view('home');
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
Route::get('/selection/question', function () {
    return view('selection.question');
});
