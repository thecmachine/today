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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/questions', 'QuestionController@getAll')->name('getAll');
Route::get('/answers', 'AnswerController@getAll')->name('getAll');

Route::post('/responses', 'ResponseController@save')->name('save');
Route::get('/responses', 'ResponseController@getAll')->name('save');


