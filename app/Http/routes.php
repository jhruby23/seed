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
	Route::get('home', ['as' => 'home', 'uses' => 'HomeController@index']);
	
	//edit user profile
	Route::get('profile', ['as' => 'profile', 'uses' => 'PagesController@profile', 'middleware' => 'auth']);
	
	//resources for products, users and bids
	Route::resource('products', 'ProductsController');
	Route::resource('users', 'UsersController', ['except' => ['create', 'store']]);
	Route::resource('bids', 'BidsController', ['except' => ['create', 'store']]);
	Route::resource('offers', 'OffersController', ['except' => ['create', 'store']]);
	//Route::resource('categories', 'CategoriesContoller', ['only' => ['index', 'show']]);
	//Route::resource('categories.subcategories', 'SubcategoriesController', ['only', ['index', 'show']]);

	//offered products
	Route::get('offers', ['as' => 'offers', 'uses' =>'PagesController@offersAll']);
	Route::get('offers/trending', 'PagesController@offersTrending');
	Route::get('offers/new', 'PagesController@offersNew');
	
	Route::get('search/{text}', 'PagesController@search');
	
	//ajax requests
	Route::post('add-comment', 'PagesController@comment');
});


