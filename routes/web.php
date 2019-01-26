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
    Route::name('brand')->group(function () {
        Route::get('brand', 'BrandController@index');
        Route::post('brand', 'BrandController@store');
    });
    Route::name('finish')->group(function () {
        Route::get('finish', 'FinishController@index');
        Route::post('finish', 'FinishController@store');
    });
    Route::name('lipstick')->group(function () {
        Route::get('lipstick', 'LipstickController@index');
        Route::post('lipstick', 'LipstickController@store');
    });
});
