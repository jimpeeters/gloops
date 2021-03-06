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

	// Logged in
	Route::group(['middleware' => 'auth'], function () {

		// Get logged in user his favourite loops
		Route::get('/profile/getFavouriteLoops', 'ProfileController@getFavouriteLoops');

		// Favourite a loop
		Route::post('/loop/favourite', array('as' => 'favourite','uses' =>'LoopController@favourite'));

		// Upload a loop
		Route::post('/station/upload', array('as' => 'upload', 'uses' => 'StationController@upload'));

		// Get edit loop page
		Route::get('/station/edit/{id}', array('as' => 'getEdit', 'uses' => 'StationController@getEdit'));

		// Edit a loop
		Route::post('/station/edit/loop', array('as' => 'edit', 'uses' => 'StationController@edit'));

		// Get logged in user his loops
		Route::get('/station/getUserLoops', 'StationController@getUserLoops');

		// Delete a loop
		Route::get('/loop/delete/{id}', 'StationController@deleteLoop');

		// Update a user
		Route::post('/profile/update', array('as' => 'updateUser', 'uses' => 'ProfileController@update'));
		
		// Overheating Reward
		Route::get('/profile/reward/overheating', array('as' => 'overheating', 'uses' => 'ProfileController@earnOverheatingReward'));

		// Get admin options page
		Route::get('/admin', 'ProfileController@admin');

		// Delete a user
		Route::get('/admin/user/delete/{id}',  'ProfileController@deleteUser');

		// Delete a user
		Route::get('/admin/loop/delete/{id}',  'ProfileController@deleteLoop');

		// Delete my account
		Route::get('/delete/account/{id}',  'ProfileController@deleteMyAccount');

	});

	// Get Profile page
	Route::get('/profile', array('as' => 'profile', 'uses' => "ProfileController@index"));

    // Facebook login
    Route::get('auth/facebook', array('as' => 'facebookLogin', 'uses' => "Auth\AuthController@redirectToProvider"));
	Route::get('auth/facebook/callback', 'Auth\AuthController@handleProviderCallback');

	// Get Register page
	Route::get('/register', array('as' => 'getRegister', 'uses' => 'Auth\AuthController@getRegister'));

	// Register
	Route::post('/register', array('as' => 'register', 'uses' => 'Auth\AuthController@register'));

	// Login
	Route::get('/login', array('as' => 'getLogin', 'uses' => 'Auth\AuthController@getRegister'));

	// Login
	Route::post('/login', array('as' => 'login', 'uses' => 'Auth\AuthController@login'));

	// Login (with modal)
	Route::post('/login/modal', array('as' => 'loginModal', 'uses' => 'Auth\AuthController@loginModal'));

	// Logout
	Route::get('auth/logout', array('as' => 'getLogout','uses' => 'Auth\AuthController@getLogout'));

	// Get Home page
	Route::get('/', array('as' => 'home', 'uses' => 'HomeController@index'));

	// Get best Loops
	Route::get('/getBestLoops', 'HomeController@getBestLoops');

	// Get Station page
	Route::get('/station', array('as' => 'station', 'uses' => "StationController@index"));

	// Get Library page
	Route::get('/library', array('as' => 'library', 'uses' => "LibraryController@index"));

	// Get Library loops 
	Route::get('/library/data', 'LibraryController@getLoops');

	// Get user
	Route::get('/getuser', 'UserController@getUser');

	// Search on tags
	Route::get('/search/tags/{query}', array('as' => 'searchOnTags', 'uses' => 'MainController@searchOnTags')); 

	// Search on category
	Route::get('/search/category/{query}', array('as' => 'searchOnCategory', 'uses' => 'MainController@searchOnCategory'));

	//Search on loopname
	Route::get('/search/loopname/{query}', array('as' => 'searchOnLoops', 'uses' => 'MainController@searchOnLoopname'));
	
	// Get specific user page
	Route::get('/user/{name}', array('as' => 'specificUser', 'uses' => 'UserController@getSpecificUser'));

	// Get specific users loops
	Route::get('/user/loops/{id}', array('as' => 'specificUserLoops', 'uses' => 'UserController@getSpecificUserLoops'));

	// Get specific Loop Page
	Route::get('/loop/name/{name}', array('as' => 'specificLoopPage', 'uses' => 'LoopController@getSpecificLoopPage'));

	// Get specific Loop
	Route::get('/loop/{id}', array('as' => 'specificLoop', 'uses' => 'LoopController@getSpecificLoop'));

	// Get specific tag page
	Route::get('/tag/{name}', array('as' => 'specificTagPage', 'uses' => 'LoopController@getSpecificTagPage'));

	// Get specific tag page
	Route::get('/loops/tag/{name}', array('as' => 'loopsFromTag', 'uses' => 'LoopController@getLoopsFromTag'));
});
