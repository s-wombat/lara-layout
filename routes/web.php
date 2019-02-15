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

Route::get('/', 'PostsController@index');
Route::get('/index.html', 'PostsController@index')->name('index');
//Route::get('/posts/{post}', 'PostsController@show');
Route::get('/categories.html', 'PostsController@categories');
Route::get('/cart.html', 'PostsController@cart');
Route::get('/checkout.html', 'PostsController@checkout');
Route::get('/contact.html', 'PostsController@contact');
Route::get('/product.html', 'PostsController@product');


Auth::routes();

Route::get('users', 'UserController@usersIndex')->name('users.index');
Route::delete('users/{id}', 'UserController@usersRemove')->name('users.remove');
Route::get('users/{id}', 'UserController@usersEdit')->name('users.edit');
Route::post('users/{id}', 'UserController@usersSave')->name('users.save');