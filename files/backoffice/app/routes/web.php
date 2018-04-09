<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', 'PagesController@index');
Route::get('/profile', 'PagesController@profile');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('bids', 'BidsController');
Route::resource('admins', 'AdminsController');
Route::resource('products', 'ProductsController');
Route::resource('categories', 'CategoriesController');
Route::resource('users', 'UsersController');
Route::resource('metrics', 'MetricsController');

