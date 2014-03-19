<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// The Auth routes handle all the login, registration, and profile functions
Route::group(['prefix' => 'auth'], function()
{
	Route::get ('login', ['uses' => 'AuthController@getLogin', 'as' => 'auth.login'])->before('guest');
	Route::post('login', ['uses' => 'AuthController@postLogin'])->before('guest');

	Route::get('logout', ['uses' => 'AuthController@getLogout', 'as' => 'auth.logout'])->before('auth');
});