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

Route::get('nhan-vien', [
    'uses' => 'StaffController@views',
    'as' => 'staff.views'
]);

Route::get('', [
    'uses' => 'HomeController@getHome',
    'as' => 'home.getHome'
]);

Route::get('gio-hang-cua-ban', [
    'uses' => 'CartController@index',
    'as' => 'cart.index'
]);
