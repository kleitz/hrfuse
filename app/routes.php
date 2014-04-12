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
	Route::get('/', ['uses' => 'SettingsController@getIndex', 'as' => 'settings'])->before('auth');
});

Route::group(['prefix' => 'directory'], function()
{
	Route::get('/', ['uses' => 'DirectoryController@getIndex', 'as' => 'directory'])->before('auth');
});

Route::group(['prefix' => 'profile', 'before' => 'auth'], function()
{
	Route::get('/', ['uses' => 'ProfileController@getIndex', 'as' => 'profile']);

	Route::get ('edit', ['uses' => 'ProfileController@getEdit', 'as' => 'profile.edit']);
	Route::post('edit', ['uses' => 'ProfileController@postEdit']);

	Route::get ('addresses', ['uses' => 'ProfileController@getAddresses', 'as' => 'profile.addresses']);
	Route::post('addresses', ['uses' => 'ProfileController@postAddresses']);
});

Route::get('/', ['uses' => 'HomeController@getIndex', 'as' => 'home'])->before('auth');