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

Route::get('/', function () {
    return view('beranda');
})->name('/');

Route::post('spta', 'bagihasilController@cari')->name('spta');
Route::get('refresh', 'bagihasilController@refresh')->name('refresh');