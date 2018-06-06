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


/*
Route::get('/users', 'UsersController@index')->name('users.index');
Route::post('/users', 'UsersController@store')->name('users.post');
Route::get('users/create', 'UsersController@create')->name('users.create');
Route::get('users/{user}', 'UsersController@show')->name('users.show');
Route::put('users/{user}', 'UsersController@update')->name('users.update');
*/

/*
Route::delete('/users/{id}', 'UsersController@hardDelete')->name('users.hardDelete'); // Forcedelete, staat voorlopig in destroy
Route::delete('/users/{user}', 'UsersController@softDelete')->name('users.softDelete'); // Softdelete
Route::get('/users/deleted', 'UsersController@showTrash')->name('users.trash');
Route::put('/users/restore/{id}', 'UsersController@restore')->name('users.restore');
*/






Route::resource('users', 'UsersController')->except([
    'destroy'    // destroy method will be replaced by softDelete and hardDelete methods
]);
    


Route::get('/users/deleted/test', 'UsersController@showTrash')->name('users.trash');
Route::post('/users/restore/{id}', 'UsersController@restore')->name('users.restore');
Route::post('/users/{id}', 'UsersController@softDelete')->name('users.softDelete');
Route::delete('/users/{id}', 'UsersController@hardDelete')->name('users.hardDelete');


Route::resource('metrics', 'MetricsController');

