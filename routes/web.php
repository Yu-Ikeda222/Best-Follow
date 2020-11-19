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

//Top
Route::get('/' ,'TopController@index')->name('index');

//Twitter
Route::get('/show_twitter' ,'TwitterController@show')->name('twitter.show');
Route::post('/store_twitter','TwitterController@store')->name('twitter.store');

//FaceBook
Route::get('/show_facebook' ,'FaceBookController@show')->name('facebook.show');
Route::post('/store_facebook','FaceBookController@store')->name('facebook.store');

//Instagram
Route::get('/show_instagram' ,'InstagramController@show')->name('instagram.show');
Route::post('/store_instagram','InstagramController@store')->name('instagram.store');



