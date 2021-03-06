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

Route::get('/', 'AppointmentsController@index');
Route::get('home/{date}', 'AppointmentsController@index');
Route::get('tasks/week', 'AppointmentsController@weekSelect');
Route::get('tasks/all', 'AppointmentsController@fullSelect');
Route::resource('tasks', 'AppointmentsController');
Route::get('home', 'AppointmentsController@index');



Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


