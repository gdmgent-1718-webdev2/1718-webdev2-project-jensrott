<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Register and Login routes (API client)

Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::middleware('auth:api')->get('user', 'UsersApiController@index');

/* Users */
Route::get('users', 'UsersApiController@index') ;// list all user
Route::post('user', 'UsersApiController@store'); // Update users
Route::put('user', 'UsersApiController@store'); // Update users
Route::delete('user/{id}', 'UsersApiController@destroy'); // Delete a specific user

/* Products */
Route::get('products', 'ProductsApiController@index'); // List all products
Route::get('product/{id}', 'ProductsApiController@show'); // Show a specific product

Route::post('product', 'ProductsApiController@store'); // Store a new products
Route::put('product', 'ProductsApiController@store'); // Update products
Route::delete('product/{id}', 'ProductsApiController@destroy'); // Delete a specific product

/* Categories */
Route::get('categories', 'CategoriesApiController@index'); // List all categories
Route::get('category/{id}', 'CategoriesApiController@show'); // Show a specific category

Route::post('category', 'CategoriesApiController@store'); // Store a new category
Route::put('category', 'CategoriesApiController@store'); // Update categories
Route::delete('category/{id}', 'CategoriesApiController@destroy'); // Delete a specific category

/* Bids */
Route::get('bids', 'BidsApiController@index'); // List all bids
Route::get('bid/{id}', 'BidsApiController@show'); // Shows a specific bid

Route::post('bid', 'BidsApiController@store'); // Store a new bid
Route::put('bid', 'BidsApiController@store'); // Update bids
Route::delete('bid/{id}', 'BidsApiController@destroy'); // Delete a specific bid

/* Auctions-Overview : combining product, bids, user, ....*/
Route::get('auctions', 'AuctionQueryController@index'); // List all auctions, going on