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

Route::get('stock-pusat', 'StockController@pusat')->middleware('auth')->name('stock.pusat');

Route::get('stock-division', 'StockController@division')->middleware('auth')->name('stock.division');

Route::get('route-modal', 'StockController@stockDivision')->middleware('auth');

Route::get('stock-division/detail', 'StockController@stockDivision')->middleware('auth')->name('stock.division-detail');

Route::post('repair-stocks', 'StockController@repairStockDivision')->middleware('auth')->name('repair.stock-division');