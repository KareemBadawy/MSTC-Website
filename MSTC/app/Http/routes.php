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



// All Routes Requires Authentication
Route::group(['middleware' => 'auth'], function(){
// Dashboard Route
	Route::get('dashboard', function(){
		return view('dashboard');
	});
/*----------------------------------------------------------------------------------*/
//Posts Routes
	Route::resource('posts','PostsController');
	Route::get('posts/{id}/destroy','PostsController@destroy');
	Route::get('posts/{id}/verticalPosts','PostsController@post_vertical');
//Posts Routes
	Route::resource('posts','PostsController');
	Route::get('posts/{id}/destroy','PostsController@destroy');
	Route::get('posts/verticalPosts/{id}','PostsController@post_vertical');
/*----------------------------------------------------------------------------------*/
//Tasks Routes
	Route::get('tasks/finish','TasksController@finished');
	Route::get('tasks/owntasks','TasksController@owntasks');
	Route::get('tasks/head/create','TasksController@createFhead');
	Route::resource('tasks','TasksController');
	Route::get('tasks/update/{id}','TasksController@updatestatus');
	Route::get('tasks/{id}/destroy','TasksController@destroy');
/*----------------------------------------------------------------------------------*/
// Scores Routes
	Route::get('scores', 'ScoresController@index');
	Route::get('scores/getByuser/{user_id}', 'ScoresController@getByuser');
	Route::get('scores/{id}/show', 'ScoresController@show');
	Route::get('scores/{task_id}/create', 'ScoresController@create');
	Route::get('scores', 'ScoresController@index');
	Route::post('scores/{task_id}', 'ScoresController@store');
/*----------------------------------------------------------------------------------*/
// News Routes
	Route::resource('news', 'NewsController');
	Route::get('news/{id}/destroy', 'NewsController@destroy');
/*----------------------------------------------------------------------------------*/
//Tasks Routes
	Route::get('tasks/finish','TasksController@finished');
	Route::get('tasks/owntasks','TasksController@owntasks');
	Route::get('tasks/head/create','TasksController@createFhead');
	Route::resource('tasks','TasksController');
	Route::get('tasks/{id}/update','TasksController@updatestatus');
	Route::get('tasks/{id}/destroy','TasksController@destroy');
/*----------------------------------------------------------------------------------*/
// Subscribtions Routes
	Route::get('subscribtions', 'SubscribtionsController@index');
/*----------------------------------------------------------------------------------*/
// Events Routes
	Route::resource('events', 'EventsController');
	Route::get('events/{id}/destroy', 'EventsController@destroy');
/*----------------------------------------------------------------------------------*/
});



// All Public Routes
Route::group([],function(){
// Homepage Route
	Route::get('/', function () {
	    return view('homepage');
	});
/*----------------------------------------------------------------------------------*/
// Show News Routes
	Route::get('news', 'NewsController@index');
	Route::get('news/{news}', 'NewsController@show');
/*----------------------------------------------------------------------------------*/
// Events Routes
	Route::get('events', 'EventsController@index');
	Route::get('events/{events}', 'EventsController@show');
/*----------------------------------------------------------------------------------*/
// Submit Subscribtions Routes
	Route::post('/', 'SubscribtionsController@store');
/*----------------------------------------------------------------------------------*/
// User Routes
	Route::get('auth/login', 'Auth\AuthController@getLogin');
	Route::post('auth/login', 'Auth\AuthController@postLogin');
/*----------------------------------------------------------------------------------*/
});





// User routes
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
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
