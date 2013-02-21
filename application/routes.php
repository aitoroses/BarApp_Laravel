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

// API
Route::get('API/wines.json', array('uses' => 'api@wines'));
Route::get('API/information.json', array('uses' => 'api@information'));
Route::post('API/register.php', array('uses' => 'api@register'));





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