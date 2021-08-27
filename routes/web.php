<?php

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


Route::get('/', 'App\Http\Controllers\Client\HomeController@home');

Route::get('search', [
    'as' => 'search',
    'uses' => 'App\Http\Controllers\Client\HomeController@getSearch'
]);
Route::get('/listcart', 'App\Http\Controllers\Client\CartController@show');
Route::get('/Add-Cart/{id}', 'App\Http\Controllers\Client\CartController@AddCart');
Route::get('/Delete-Cart/{id}', 'App\Http\Controllers\Client\CartController@DeleteCart');
Route::get('/Update-Cart/{id}/{quantity}', 'App\Http\Controllers\Client\CartController@UpdateCart');
Route::group(['prefix' => 'gio-hang', 'middleware' => 'web'], function () {
    Route::get('/thanh-toan', 'App\Http\Controllers\Client\CartController@getPay')->name('pay');
    Route::post('login', 'App\Http\Controllers\Client\PagesController@postLogin');
    Route::post('/thanh-toan', 'App\Http\Controllers\Client\CartController@saveinfoCart');
});
Route::get('dangki', 'App\Http\Controllers\Client\PagesController@getRg');
Route::post('dangki', 'App\Http\Controllers\Client\PagesController@postRg')->name('save');
Route::get('login', 'App\Http\Controllers\Client\PagesController@getLogin');
Route::post('login', 'App\Http\Controllers\Client\PagesController@postLogin');
Route::get('logout', 'App\Http\Controllers\Client\PagesController@logout');

Route::get('{slug}', 'App\Http\Controllers\Client\HomeController@index');
Route::group(['prefix' => 'Admin'], function () {

    Route::get('/Product', 'App\Http\Controllers\Admin\ProductController@index');
    Route::group(['prefix' => 'product'], function () {

        Route::get('/Product', 'App\Http\Controllers\Admin\ProductController@index')->name('product_index');
    });
    Route::get('/Category', 'App\Http\Controllers\Admin\CategoryController@index');
    Route::group(['prefix' => 'category'], function () {

        Route::get('/Category', 'App\Http\Controllers\Admin\CategoryController@index')->name('category_index');
    });

    Route::get('/Order', 'App\Http\Controllers\Admin\OrderController@index');
    Route::group(['prefix' => 'order'], function () {

        Route::get('/Order', 'App\Http\Controllers\Admin\OrderController@index')->name('order_index');
    });
    Route::get('/OrderDetail', 'App\Http\Controllers\Admin\OrderDetailController@index');
    Route::group(['prefix' => 'orderdetail'], function () {

        Route::get('/OrderDetail', 'App\Http\Controllers\Admin\OrderDetailController@index')->name('orderdetail_index');
    });
    Route::get('/Post', 'App\Http\Controllers\Admin\PostController@index');
    Route::group(['prefix' => 'post'], function () {

        Route::get('/Post', 'App\Http\Controllers\Admin\PostController@index')->name('post_index');
    });
    Route::get('/Menu', 'App\Http\Controllers\Admin\MenuController@index');
    Route::group(['prefix' => 'menu'], function () {

        Route::get('/Menu', 'App\Http\Controllers\Admin\MenuController@index')->name('menu_index');
    });
    Route::get('/Slider', 'App\Http\Controllers\Admin\SliderController@index');
    Route::group(['prefix' => 'slider'], function () {

        Route::get('/Slider', 'App\Http\Controllers\Admin\SliderController@index')->name('slider_index');
    });
    Route::get('/User', 'App\Http\Controllers\Admin\UserController@index');
    Route::group(['prefix' => 'user'], function () {

        Route::get('/User', 'App\Http\Controllers\Admin\UserController@index')->name('user_index');
    });
});
