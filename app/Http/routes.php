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

		//Get logged in user his favourite loops
		Route::get('/profile/getFavouriteLoops', 'ProfileController@getFavouriteLoops');

		//Favourite a loop
		Route::post('/loop/favourite', array('as' => 'favourite','uses' =>'LoopController@favourite'));

		//Upload a loop
		Route::post('/station/upload', array('as' => 'upload', 'uses' => 'StationController@upload'));

		//Get logged in user his loops
		Route::get('/station/getUserLoops', 'StationController@getUserLoops');

		//Delete a loop
		Route::post('/loop/delete', 'StationController@deleteLoop');

		//Update a user
		Route::post('/profile/update', array('as' => 'updateUser', 'uses' => 'ProfileController@update'));

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

	//library
	Route::get('/library', array('as' => 'library', 'uses' => "LibraryController@index"));

	//Library loops 
	Route::get('/library/data', 'LibraryController@getLoops');

	//get user
	Route::get('/getuser', 'UserController@getUser');

	//Profile page
	Route::get('/profile', array('as' => 'profile', 'uses' => "ProfileController@index"));

});
