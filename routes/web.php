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

//Route::get('users', 'UserController@usersIndex')->name('users.index');
//Route::delete('users/{id}', 'UserController@usersRemove')->name('users.remove');
//Route::get('users/{id}', 'UserController@usersEdit')->name('users.edit');
//Route::post('users/{id}', 'UserController@usersSave')->name('users.save');


Route::
prefix('admin')
    ->name('admin.')
    ->group(function () {
        //users group
        Route::prefix('users')
            ->name('users.')
            ->group(function () {
                Route::get('/', 'Admin\UserController@index')->name('index');
                //showCreateForm
                Route::get('/create', 'Admin\UserController@showCreateForm')->name('create');
                //showEditForm
                Route::get('/{id}', 'Admin\UserController@showEditForm')
                    ->where('id', '[0-9]+')
                    ->name('edit');

                Route::delete('/{id}', 'Admin\UserController@remove')->name('remove');
                Route::post('/{id?}', 'Admin\UserController@store')->name('store');
            });

    });