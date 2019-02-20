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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::middleware(['auth','home'])
    ->group(function () {
        Route::get('/home/', 'HomeController@index')->name('home');
    });



Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/home/', 'Admin\AdminController@index')->name('home');
        //       Route::get('/products/', 'Admin/AdminController@products')->name('products');
        //       Route::get('/product/{id}', 'Admin/AdminController@product')->where('id', '[0-9]+')->name('product');
        Route::get('/orders/', 'Admin\AdminController@orders')->name('orders');
        Route::get('/categories/', 'Admin\AdminController@categories')->name('categories');
        Route::prefix('users')
            ->name('users.')
            ->group(function () {
                Route::get('/', 'Admin\UserController@index')->name('index');
                Route::get('/{id}', 'Admin\UserController@showForm')->where('id', '([0-9]+|create)')->name('edit');
                Route::delete('/del/', 'Admin\UserController@remove')->name('del');
                Route::post('/save/', 'Admin\UserController@save')->name('save');
            });
        Route::prefix('products')
            ->name('products.')
            ->group(function () {
                Route::get('/', 'Admin\ProductController@index')->name('index');
                Route::get('/{id}', 'Admin\ProductController@showForm')->where('id', '([0-9]+|create)')->name('edit');
                Route::delete('/del/', 'Admin\ProductController@remove')->name('del');
                Route::post('/save/', 'Admin\ProductController@save')->name('save');
                Route::post('/active/', 'Admin\ProductController@active')->name('active');
            });
        Route::prefix('categories')
            ->name('categories.')
            ->group(function () {
                Route::get('/', 'Admin\CategoriesController@index')->name('index');
                Route::get('/{id}', 'Admin\CategoriesController@showForm')->where('id', '([0-9]+|create)')->name('edit');
                Route::delete('/del/', 'Admin\CategoriesController@remove')->name('del');
                Route::post('/save/', 'Admin\CategoriesController@save')->name('save');
            });

    });


