<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

	//Logged in
	Route::group(['middleware' => 'auth'], function () {

	});

    //facebook login
    Route::get('auth/facebook', 'Auth\AuthController@redirectToProvider');
	Route::get('auth/facebook/callback', 'Auth\AuthController@handleProviderCallback');

	//register
	Route::post('/register', array('as' => 'register', 'uses' => 'Auth\AuthController@register'));

	//login
	Route::post('/login', array('as' => 'login', 'uses' => 'Auth\AuthController@login'));

	//uitloggen
	Route::get('auth/logout', array('as' => 'getLogout','uses' => 'Auth\AuthController@getLogout'));

	//home
	Route::get('/', array('as' => 'home', 'uses' => 'HomeController@index'));

	//station
	Route::get('/station', array('as' => 'station', 'uses' => "StationController@index"));
	//stationData
	//Route::get('/station/data', 'StationController@getData');

});
