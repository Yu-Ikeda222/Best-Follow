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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/' ,'TwitterController@index')->name('index');
Route::post('/store','TwitterController@store')->name('store');
Route::get('/show','TwitterController@show')->name('show');


Route::get('showFriends','TwitterController@showFriends');
