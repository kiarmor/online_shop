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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['status', 'auth']], function () {
    $groupData = [
      'namespace' => 'ShopController\Admin',
        'prefix' => 'admin',
    ];

    Route::group($groupData, function (){
        Route::resource('index', 'MainAdminController')
            ->names('shop.admin.index');
        Route::resource('orders', 'OrderController')
            ->names('shop.admin.orders');
        Route::get('/orders/change/{id}', 'OrderController@change')
            ->name('shop.admin.orders.change');
        Route::post('/orders/save/{id}', 'OrderController@save')
            ->name('shop.admin.orders.save');
        Route::get('/orders/forcedestroy/{id}', 'OrderController@forcedestroy')
            ->name('shop.admin.orders.forcedestroy');

        Route::get('categories/mydel', 'CategoryController@mydel')
            ->name('shop.admin.categories.mydel');
        Route::resource('categories', 'CategoryController')
            ->names('shop.admin.categories');

        Route::resource('users', 'UserController')
            ->names('shop.admin.users');

        Route::resource('products', 'ProductController')
            ->names('shop.admin.products');

    });

});

Route::get('user/index', 'ShopController\User\MainUserController@index');
