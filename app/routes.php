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

Route::group(['prefix' => 'auth'], function()
{
	Route::get ('login', ['uses' => 'AuthController@getLogin', 'as' => 'auth.login'])->before('guest');
	Route::post('login', ['uses' => 'AuthController@postLogin'])->before('guest');

	Route::get('logout', ['uses' => 'AuthController@getLogout', 'as' => 'auth.logout'])->before('auth');
});

Route::group(['prefix' => 'settings'], function()
{
	Route::get('/', ['uses' => 'SettingsController@getIndex', 'as' => 'settings.index'])->before('auth');
});

Route::get('/', ['uses' => 'HomeController@getIndex', 'as' => 'home'])->before('auth');