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
        Route::get('/orders/forcedelete/{id}', 'OrderController@forcedelete')
            ->name('shop.admin.orders.forcedelete');
    });

});

Route::get('user/index', 'ShopController\User\MainUserController@index');
