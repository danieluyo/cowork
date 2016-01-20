<?php

/*
|--------------------------------------------------------------------------
| Back-end Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
Route::group(
	[
		'prefix' => 'dashboard',
		'middleware' => [ 'web', 'auth' ],
	],
	function() {
		Route::get( '/', [ 'uses' => 'DashboardController@home', 'as' => 'dashboard.index' ] );
		Route::get( '/users', [ 'uses' => 'UserController@index', 'as' => 'dashboard.users' ] );

		Route::resource('categories','CategoryController');
		Route::resource('venues','VenueController');
		Route::resource('spaces','Space\SpaceController');
	}
);


/*
|--------------------------------------------------------------------------
| Miscellaneous Routes
|--------------------------------------------------------------------------
*/
Route::get( 'logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index' );


/*
|--------------------------------------------------------------------------
| AJAX Routes
|--------------------------------------------------------------------------
*/
Route::group(
	[
		'prefix' => 'ajax',
		'as'     => 'ajax.',
	],
	function() {

	}
);


/*
|--------------------------------------------------------------------------
| Front-end Routes
|--------------------------------------------------------------------------
*/
Route::group(
	[
//		'prefix'     => Localization::setLocale(),
		'middleware' => [
//			'localization-session-redirect',
//			'localization-redirect',
			'web',
		],
		'as'         => 'frontend.',
	],
	function() {
		Route::get( '/', [ 'uses' => 'FrontendController@home', 'as' => 'home' ] );
		Route::get( 'home', [ 'uses' => 'FrontendController@home', 'as' => 'home' ] );
		Route::get( 'about-us', [ 'uses' => 'FrontendController@aboutUs', 'as' => 'aboutUs' ] );
		Route::get( 'contact-us', [ 'uses' => 'FrontendController@contactUs', 'as' => 'contactUs' ] );
		Route::post( 'contact-us', [ 'uses' => 'FrontendController@postContact', 'as' => 'contactUs.post' ] );
		Route::get( '/users/{user}', [ 'uses' => 'FrontendController@profile' ] );
		Route::auth();
//no route for:
// {category}/ ----
//
// Normal listing
// {category}/{city}/
// {category}/{city}/{listingID}

// accessing venue page:
// spaces/{venue_slug}/
		Route::get('/spaces/{venue_slug}',[ 'uses' => 'Space\SpaceController@index' ]);
		Route::get( '/{category}/{city}/', [ 'uses' => 'Space\CategoryCitySpaceController@index' ] );
		Route::get( '/{category}/{city}/{space}', [ 'uses' => 'Space\CategoryCitySpaceController@show' ] );


	}
);




