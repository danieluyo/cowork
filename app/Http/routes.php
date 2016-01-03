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
//		'middleware' => [ 'web', 'auth' ],
	],
	function() {
		Route::get( '/', [ 'uses' => 'DashboardController@home', 'as' => 'dashboard.index' ] );
		Route::get( '/users', [ 'uses' => 'UserController@index', 'as' => 'dashboard.users' ] );

		Route::resource('categories','CategoryController');
		Route::resource('listings','Listing\ListingController');
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


		Route::get( '/coffices/{user}/category/{category}/{listing}', [ 'uses' => 'Listing\UserListingController@show' ] );
		Route::get( '/coffices/{user}/category/{category}/', [ 'uses' => 'Listing\UserListingController@index' ] );
		Route::get( '/coffices/{country}/category/{category}/', [ 'uses' => 'Listing\CountryCategoryListingController@index' ] );
		Route::get( '/coffices/{country}/category/{category}/{listing}', [ 'uses' => 'Listing\CountryCategoryListingController@show' ] );

//		Route::get( '/coffices/category/{category}/', [ 'uses' => 'Listing\CategoryListingController@index' ] );
//		Route::get( '/coffices/category/{category}/{listing}', [ 'uses' => 'Listing\CategoryListingController@show' ] );

		Route::auth();

		Route::get( '/{user}', [ 'uses' => 'FrontendController@profile' ] );
	}
);




