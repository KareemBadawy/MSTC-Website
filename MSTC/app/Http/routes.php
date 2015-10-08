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
Route::get('news', 'NewsController@index');
Route::get('news/create', 'NewsController@create');
Route::get('news/{id}', 'NewsController@show');
Route::post('news', 'NewsController@store');
/*----------------------------------------------------------------------------------*/

// Subscribtions Routes
Route::get('subscribtions', 'SubscribtionsController@index');
Route::post('/', 'SubscribtionsController@store');
/*----------------------------------------------------------------------------------*/

// Events Routes
Route::resource('events', 'EventsController');
Route::get('events/{id}/destroy', 'EventsController@destroy');
/*----------------------------------------------------------------------------------*/