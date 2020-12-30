<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('staff/insert', 'StaffController@insert')->name('insert_staff');
Route::post('staff/update', 'StaffController@update')->name('update_staff');
Route::get('staff/delete/{id}', 'StaffController@delete')->name('delete_staff');
Route::get('staff/show/{id}', 'StaffController@show')->name('show_staff');
Route::get('staff/index', 'StaffController@index')->name('index');

Route::get('cart/insert/{id}', 'CartController@add')->name('add_cart');
Route::get('cart/update', 'CartController@update')->name('update_cart');
Route::get('cart/destroy/{id}', 'CartController@destroy')->name('destroy_cart');
Route::get('cart/show', 'CartController@index')->name('show_cart');

