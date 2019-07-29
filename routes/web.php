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
Route::get('/index.html', 'PostsController@index');
Route::get('/categories.html', 'PostsController@categories');
Route::get('/cart.html', 'PostsController@cart');
Route::get('/checkout.html', 'PostsController@checkout');
Route::get('/contact.html', 'PostsController@contact');
Route::get('/product.html', 'PostsController@product');


Route::prefix('products')
    ->name('products.')
    ->group(function (){
    Route::get('/', 'ProductController@index')->name('index');
    Route::get('/sort', 'ProductController@sort')->name('sort');
    Route::get('/{id}', 'ProductController@buyProduct')->where('id', '[0-9]+')->name('buy');
    Route::prefix('cart')
        ->name('cart.')
        ->group(function (){
            Route::get('/', 'CartController@index')->name('index');
            Route::delete('/{id}', 'CartController@removeItem')->name('remove');
            Route::get('/destroy', 'CartController@destroy')->name('destroy');
            Route::get('/update/{id}', 'CartController@update')->name('update');
    });

});


Auth::routes();


Route::
prefix('admin')
    ->middleware('admin')
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
                Route::post('/{id?}', 'Admin\UserController@save')->name('save');
                Route::get('/sort', 'Admin\UserController@sort')->name('sort');
            });
        //products group
        Route::prefix('products')
            ->name('products.')
            ->group(function () {
                Route::get('/', 'Admin\ProductController@index')->name('index');
                //showCreateForm
                Route::get('/create', 'Admin\ProductController@showCreateForm')->name('create');
                //showEditForm
                Route::get('/{id}', 'Admin\ProductController@showEditForm')->where('id', '[0-9]+')->name('edit');

                Route::delete('/{id}', 'Admin\ProductController@remove')->name('remove');
                Route::post('/{id?}', 'Admin\ProductController@save')->name('save');
                Route::get('/sort', 'Admin\ProductController@sort')->name('sort');

            });
        //categories group
        Route::resource('category', 'Admin\CategoryController');

    });