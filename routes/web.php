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
    ->middleware('BreadCrumbs:Админ панель,admin.home')
    ->group(function () {
        Route::get('/home/', 'Admin\AdminController@index')->name('home');
        Route::get('/orders/', 'Admin\AdminController@orders')->name('orders')->middleware('BreadCrumbs:Заказы,admin.orders.index');

        Route::prefix('users')
            ->name('users.')
            ->middleware('BreadCrumbs:Пользователи,admin.users.index')
            ->group(function () {
                Route::get('/', 'Admin\UserController@index')->name('index');
                Route::get('/{id}', 'Admin\UserController@showForm')->where('id', '([0-9]+|create)')->name('edit');
                Route::delete('/del/', 'Admin\UserController@remove')->name('del');
                Route::post('/save/', 'Admin\UserController@save')->name('save');
            });

        Route::prefix('api')
            ->name('api.')
            ->group(function () {
                Route::post('/publish/{name}', 'Admin\ApiController@publish')->where('name', 'Products|Categories')->name('publish');
                Route::get('/categories/', 'Admin\ApiController@getCategories')->name('get-cat');
            });

        Route::prefix('products')
            ->name('products.')
            ->middleware('BreadCrumbs:Товары,admin.products.index')
            ->group(function () {
                Route::get('/', 'Admin\ProductController@index')->name('index');
                Route::get('/{id}', 'Admin\ProductController@showForm')->where('id', '([0-9]+)')->name('edit')
                    ->middleware("BreadCrumbs:Редактирование товара,admin.products.edit");
                Route::get('/create', 'Admin\ProductController@showFormCreate')->name('create')
			->middleware("BreadCrumbs:Создание товара,admin.products.create");
                Route::delete('/del/', 'Admin\ProductController@remove')->name('del');
                Route::post('/save/', 'Admin\ProductController@save')->name('save');
            });

        Route::prefix('categories')
            ->name('categories.')
            ->middleware('BreadCrumbs:Каталог,admin.categories.index')
            ->group(function () {
                Route::get('/', 'Admin\CategoriesController@index')->name('index');
                Route::get('/{id}', 'Admin\CategoriesController@showForm')->where('id', '([0-9]+|create)')->name('edit');
                Route::delete('/del/', 'Admin\CategoriesController@remove')->name('del');
                Route::post('/save/', 'Admin\CategoriesController@save')->name('save');
            });

    });


