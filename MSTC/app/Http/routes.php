<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', function () {
    return view('homepage');
});
//Posts Routes
Route::resource('posts','PostsController');
Route::get('posts/destroy/{id}','PostsController@destroy');
/*----------------------------------------------------------------------------------*/
//Tasks Routes
Route::get('tasks/finish','TasksController@finished');
Route::resource('tasks','TasksController');
Route::get('tasks/update/{id}','TasksController@updatestatus');
Route::get('tasks/destroy/{id}','TasksController@destroy');
/*----------------------------------------------------------------------------------*/
// News Routes
Route::resource('news', 'NewsController');
Route::get('news/{id}/destroy', 'NewsController@destroy');
/*----------------------------------------------------------------------------------*/
// Subscribtions Routes
Route::get('subscribtions', 'SubscribtionsController@index');
Route::post('/', 'SubscribtionsController@store');
/*----------------------------------------------------------------------------------*/
// Events Routes
Route::resource('events', 'EventsController');
Route::get('events/{id}/destroy', 'EventsController@destroy');
/*----------------------------------------------------------------------------------*/
// User routes
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::get('email', 'Auth\PasswordController@getEmail');
Route::post('email', 'Auth\PasswordController@postEmail');
Route::get('reset/{code}', 'Auth\PasswordController@getReset');
Route::post('reset', 'Auth\PasswordController@postReset');
/*------------------------------------------------------------------------------*/
// Question Routes
Route::resource('questions','QuestionsController');
/*----------------------------------------------------------------------------------*/
// Choices Routes 
//Route::resource('questions.choices', 'ChoicesController');
Route::resource('questions.choices','ChoicesController');
/*------------------------------------------------------------------------------*/
// Votes Routes
Route::resource('questions.choices.votes','VotesController');
/*------------------------------------------------------------------------------*/
