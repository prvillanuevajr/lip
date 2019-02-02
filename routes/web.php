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

Route::get('/', 'LandingPageController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin/')->name('admin.')->middleware('auth')->group(function () {
    Route::name('brand')->prefix('brand')->group(function () {
        Route::get('', 'BrandController@index');
        Route::post('', 'BrandController@store');
    });
    Route::name('finish')->prefix('finish')->group(function () {
        Route::get('', 'FinishController@index');
        Route::post('', 'FinishController@store');
        Route::delete('/{finish}', 'FinishController@destroy')->name('.destroy');
    });
    Route::name('lipstick')->prefix('lipstick')->group(function () {
        Route::get('', 'LipstickController@index');
        Route::post('', 'LipstickController@store');
        Route::delete('/{lipstick}', 'LipstickController@destroy')->name('.destroy');
    });
});

Route::prefix('product/')->group(function () {
    Route::get('', 'ProductController@index');
    Route::get('/list', 'ProductController@productList');
    Route::get('/{lipstick}', 'ProductController@show');
});

Route::prefix('cart/')->name('cart')->middleware('auth')->group(function () {
    Route::get('', 'CartController@index');
    Route::post('', 'CartController@store');
    Route::get('/list', 'CartController@list')->name('.list');
});
