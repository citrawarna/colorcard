<?php

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


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::resource('category', 'CategoryController')->middleware('auth');

Route::resource('colorcard', 'ColorCardController')->middleware('auth');

Route::resource('division', 'DivisionController')->middleware('auth');

Route::get('receive', 'ReceiveController@form')->middleware('auth')->name('receive.index');

Route::post('receive/store', 'ReceiveController@store')->middleware('auth')->name('receive.store');

Route::get('send', 'SendController@form')->middleware('auth')->name('send.index');

Route::post('send/store', 'SendController@store')->middleware('auth')->name('send.store');