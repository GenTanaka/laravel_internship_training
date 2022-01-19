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


Route::get('/', function () {
    return view('welcome');
});

// category関係のルーティング
Route::get('/category', 'CategoryController@index')->name('category.index');

Route::get('/category/create', 'CategoryController@create')->name('category.create');
Route::post('/category/store', 'CategoryController@store')->name('category.store');

Route::get('/category/edit/{id}', 'CategoryController@edit')->name('category.edit');
Route::put('/category/update/{id}', 'CategoryController@update')->name('category.update');

Route::delete('/category/delete/{id}', 'CategoryController@delete')->name('category.delete');


// post関係のルーティング
Route::get('/post', 'PostController@index')->name('post.index');

Route::get('/post/create', 'PostController@create')->name('post.create');
Route::post('/post/store', 'PostController@store')->name('post.store');

Route::get('/post/show/{id}', 'PostController@show')->name('post.show');

Route::get('/post/edit/{id}', 'PostController@edit')->name('post.edit');
Route::put('/post/update/{id}', 'PostController@update')->name('post.update');

Route::delete('post/delete/{id}', 'PostController@delete')->name('post.delete');