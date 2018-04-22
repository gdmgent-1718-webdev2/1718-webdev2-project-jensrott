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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/* Users */
Route::get('users', 'UsersApiController@index'); // List all users
Route::get('user/{id}', 'UsersApiController@show'); // Show a specific user

Route::post('user', 'UsersApiController@store'); // Store a new user
Route::put('user', 'UsersApiController@store'); // Update users
Route::delete('user/{id}', 'UsersApiController@destroy'); // Delete a specific user

/* Products */
Route::get('products', 'ProductsApiController@index'); // List all users
Route::get('product/{id}', 'ProductsApiController@show'); // Show a specific user

Route::post('product', 'ProductsApiController@store'); // Store a new user
Route::put('product', 'ProductsApiController@store'); // Update users
Route::delete('product/{id}', 'ProductsApiController@destroy'); // Delete a specific user

/* Categories */
Route::get('categories', 'CategoriesApiController@index'); // List all users
Route::get('category/{id}', 'CategoriesApiController@show'); // Show a specific user

Route::post('category', 'CategoriesApiController@store'); // Store a new user
Route::put('category', 'CategoriesApiController@store'); // Update users
Route::delete('category/{id}', 'CategoriesApiController@destroy'); // Delete a specific user
