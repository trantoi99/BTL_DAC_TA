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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('staff/insert', 'StaffController@insert')->name('insert_staff');
Route::post('staff/update', 'StaffController@update')->name('update_staff');
Route::get('staff/delete', 'StaffController@delete')->name('delete_staff');
Route::get('staff/show', 'StaffController@show')->name('show_staff');
