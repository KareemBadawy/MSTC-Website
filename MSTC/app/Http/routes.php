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

Route::get('/', function () {
    return view('welcome');
});


Route::get('news', 'NewsController@index');
Route::get('news/create', 'NewsController@create');
Route::get('news/{id}', 'NewsController@show');
Route::post('news', 'NewsController@store');
