<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::delete('/product/{id}', 'ProductController@destroy')->name('products.destroy');
// Route::put('/product/{id}', 'ProductController@update')->name('products.update');
// Route::get('/product/{id}/edit', 'ProductController@edit')->name('products.edit');
// Route::get('/product/create',  'ProductController@create')->name('products.create');
// Route::get('/product/{id}', 'ProductController@show')->name('products.show');
// Route::get('/product', 'ProductController@index')->name('products.index');
// Route::post('/product', 'ProductController@store')->name('products.store');
Route::any('products/search', 'ProductController@search')->name('products.search');
Route::resource('products', 'ProductController')->middleware('auth');//->middleware('auth');

Route::get('/login', function () {
    return 'Login';
})->name('login');

Route::group([
    'middleware' => [],
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'name' => 'admin.'
], function () {
});

Auth::routes(['register' => false]);
