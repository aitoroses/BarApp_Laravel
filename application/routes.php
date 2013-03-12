<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Simply tell Laravel the HTTP verbs and URIs it should respond to. It is a
| breeze to setup your application using Laravel's RESTful routing and it
| is perfectly suited for building large applications and simple APIs.
|
| Let's respond to a simple GET request to http://example.com/hello:
|
|		Route::get('hello', function()
|		{
|			return 'Hello World!';
|		});
|
| You can even respond to more than one URI:
|
|		Route::post(array('hello', 'world'), function()
|		{
|			return 'Hello World!';
|		});
|
| It's easy to allow URI wildcards using (:num) or (:any):
|
|		Route::put('hello/(:any)', function($name)
|		{
|			return "Welcome, $name.";
|		});
|
*/

Route::get('/', array('as' => 'login', 'uses' => 'login@index'));
Route::get('/logout', array('as' => 'logout', 'uses' => 'login@logout'));
Route::post('/verify', array('as' => 'verify', 'uses' => 'login@verify'));


// INFORMATION ROUTES
Route::get('/information', array('as' => 'index','uses'=>'information@index', 'before' => 'auth'));
Route::get('/information/(:any)', array('as'=>'information', 'uses'=>'information@view', 'before' => 'auth'));
Route::get('/information/(:any)/edit', array('as'=>'edit_info', 'uses'=>'information@edit', 'before' => 'auth'));
Route::put('/information/update', array('uses'=>'information@update'));
Route::post('/information/add_new', array('uses'=>'information@addnew'));
Route::get('/information/create', array('as' => 'create', 'uses'=>'information@create', 'before' => 'auth'));
Route::delete('/information/delete', array('as' => 'delete', 'uses' => 'information@destroy'));

// USER ROUTES
//Route::get('/users', array('as' => '', 'uses' => 'users@', 'before' => 'auth'));
Route::get('/users', array('as' => 'users_index', 'uses' => 'users@index', 'before' => 'auth'));
Route::get('/users/(:any)', array('as' => 'users_view', 'uses' => 'users@view', 'before' => 'auth'));
Route::get('/users/(:any)/edit', array('as' => 'users_edit', 'uses' => 'users@edit', 'before' => 'auth'));
Route::get('/users/create', array('as' => 'users_create', 'uses' => 'users@create', 'before' => 'auth'));
Route::put('/users/update', array('uses' => 'users@update', 'before' => 'auth'));
Route::post('/users/add_new', array('uses' => 'users@addnew', 'before' => 'auth'));
Route::delete('/users/delete', array('uses' => 'users@destroy', 'before' => 'auth'));


// WINES ROUTES
Route::get('/wines', array('as' => 'wines_index','uses'=>'wines@index', 'before' => 'auth'));
Route::get('/wines/(:any)', array('as'=>'wine', 'uses'=>'wines@view', 'before' => 'auth'));
Route::get('/wines/create', array('as' => 'wines_create', 'uses'=>'wines@create', 'before' => 'auth'));
Route::get('/wines/(:any)/edit', array('as'=>'edit_wine', 'uses'=>'wines@edit', 'before' => 'auth'));
Route::put('/wines/update', array('uses'=>'wines@update'));
Route::post('/wines/add_new', array('uses'=>'wines@addnew'));
Route::delete('/wines/delete', array('as' => 'delete', 'uses' => 'wines@destroy'));

// PINCHO ROUTES

Route::get('/pinchos', array('as' => 'index_pinchos','uses'=>'pinchos@index', 'before' => 'auth'));
Route::get('/pinchos/(:any)', array('as'=>'pincho', 'uses'=>'pinchos@view', 'before' => 'auth'));
Route::get('/pinchos/create', array('as' => 'create_pincho', 'uses'=>'pinchos@create', 'before' => 'auth'));
Route::get('/pinchos/(:any)/edit', array('as'=>'edit_pincho', 'uses'=>'pinchos@edit', 'before' => 'auth'));
Route::put('/pinchos/update', array('uses'=>'pinchos@update'));
Route::post('/pinchos/add', array('uses'=>'pinchos@add'));
Route::delete('/pinchos/delete', array('uses' => 'pinchos@destroy'));

// GIN ROUTES

Route::get('/gins', array('as' => 'index_gins','uses'=>'gins@index', 'before' => 'auth'));
Route::get('/gins/(:any)', array('as'=>'gin', 'uses'=>'gins@view', 'before' => 'auth'));
Route::get('/gins/create', array('as' => 'create_gin', 'uses'=>'gins@create', 'before' => 'auth'));
Route::get('/gins/(:any)/edit', array('as'=>'edit_gin', 'uses'=>'gins@edit', 'before' => 'auth'));
Route::put('/gins/update', array('uses'=>'gins@update'));
Route::post('/gins/add', array('uses'=>'gins@add'));
Route::delete('/gins/delete', array('uses' => 'gins@destroy'));

// LIKE ROUTES

Route::get('/likes', array('as' => 'index_likes','uses'=>'likes@index', 'before' => 'auth'));
Route::get('/likes/(:any)', array('as'=>'like', 'uses'=>'likes@view', 'before' => 'auth'));
Route::get('/likes/create', array('as' => 'create_like', 'uses'=>'likes@create', 'before' => 'auth'));
Route::get('/likes/(:any)/edit', array('as'=>'edit_like', 'uses'=>'likes@edit', 'before' => 'auth'));
Route::put('/likes/update', array('uses'=>'likes@update'));
Route::post('/likes/add', array('uses'=>'likes@add'));
Route::delete('/likes/delete', array('uses' => 'likes@destroy'));

// COMMENT ROUTES
Route::delete('/comments/delete', array('uses' => 'comments@destroy'));

// API
Route::get('API/wines', array('uses' => 'api@wines'));
Route::get('API/wine/(:any)', array('uses' => 'api@wine'));

Route::get('API/information.json', array('uses' => 'api@information'));
Route::get('API/likes', array('uses' => 'api@likes'));
Route::get('API/likes/(:any)', array('uses' => 'api@like'));
	
	// User
	Route::post('API/register', array('uses' => 'api@register'));
	Route::post('API/login', array('uses' => 'api@login'));
	Route::get('API/check', array('uses' => 'api@check'));
	
	// Comments
		// Esta ruta tiene 2 wildcards, el tipo de item, y el identificador del item
	Route::get('API/comments/(:any)/(:any)', function($type, $id){

		return Response::eloquent(Comment::where($type.'_id', '=', $id)->get());	

	});
	Route::post('API/comments/(:any)/(:any)', function($type, $id){

		Comment::create(array(
			$type.'_id' => $id,
			'name' => Input::get('name'),
			'comment' => Input::get('comment'),
			'rating' => Input::get('rating')
		));
	});
	






/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application.
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Route::get('/', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to_route('login');
});