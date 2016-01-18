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
	//auth, dashboard
	Route::get('/', 'PagesController@welcome');
	Route::auth();
	Route::get('/home', ['as' => 'home', 'uses' => 'HomeController@index']);
	
	//edit user profile
	Route::get('/profile', ['as' => 'profile', 'uses' => 'PagesController@profile', 'middleware' => 'auth']);
	
	//resources for products and users
	Route::resource('products', 'ProductsController');
	Route::resource('users', 'UsersController', ['except' => ['create', 'store']]);

	//offered products
	Route::get('/offers', 'PagesController@offersAll');
	Route::get('/offers/trending', 'PagesController@offersTrending');
	Route::get('/offers/new', 'PagesController@offersNew');
	
	
	//not implemented yet
	Route::get('/categories', 'PagesController@categories'); //->resource
	Route::get('/product-types', 'PagesController@productTypes'); //->resource
	Route::get('/bids', 'PagesController@bids'); //?
	Route::get('/search/{text}', 'PagesController@search');
});


