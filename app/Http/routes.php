<?php


/*
|--------------------------------------------------------------------------
| Front-end Routes
|--------------------------------------------------------------------------
*/
Route::group(
	[
//		'prefix'     => Localization::setLocale(),
//		'middleware' => [
//			'localization-session-redirect',
//			'localization-redirect',
//		],
		'as' => 'frontend.',
	],
	function() {
		Route::get( '/', [ 'uses' => 'FrontendController@home', 'as' => 'home' ] );
		Route::get( 'home', [ 'uses' => 'FrontendController@home', 'as' => 'home' ] );
		Route::get( 'about-us', [ 'uses' => 'FrontendController@aboutUs', 'as' => 'aboutUs' ] );
		Route::get( 'contact-us', [ 'uses' => 'FrontendController@contactUs', 'as' => 'contactUs' ] );
		Route::post( 'contact-us', [ 'uses' => 'FrontendController@postContact', 'as' => 'contactUs.post' ] );

		Route::get( 'auth/login', [ 'uses' => 'Auth\AuthController@getLogin', 'as' => 'login' ] );
		Route::post( 'auth/login', [ 'uses' => 'Auth\AuthController@postLogin', 'as' => 'postLogin' ] );
		Route::get( 'auth/logout', [ 'uses' => 'Auth\AuthController@getLogout', 'as' => 'logout' ] );
		Route::get( 'auth/register', [ 'uses' => 'Auth\AuthController@getRegister', 'as' => 'register' ] );
		Route::post( 'auth/register', [ 'uses' => 'Auth\AuthController@postRegister', 'as' => 'postRegister' ] );
	}
);

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
		'prefix'     => 'dashboard',
		'middleware' => [ 'web', 'auth' ],
	],
	function() {
		Route::get( '/', [ 'uses' => 'DashboardController@home', 'as' => 'dashboard.index' ] );
		Route::get( '/users', [ 'uses' => 'UserController@all', 'as' => 'dashboard.users' ] );

	}
);


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
		Route::get( '/api/get-downloads/{appId}', 'AjaxController@getDownloads', [ 'as' => 'get-downloads' ] )->where( [ 'appId' => '[0-9]+' ] );
	}
);

// Todo Add # symbol to users show route, to gain more SEO traffic

/*
|--------------------------------------------------------------------------
| Miscellaneous Routes
|--------------------------------------------------------------------------
*/
Route::get( 'logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index' );