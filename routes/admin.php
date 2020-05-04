<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your plugin. These
| routes are loaded by the RouteServiceProvider of your plugin within
| a group which contains the "web" middleware group and your plugin name
| as prefix. Now create something great!
|
*/

Route::get('/', 'AdminController@index')->name('index');

Route::post('/{payment}/accept_payment', 'AdminController@accept_payment')->name('accept_payment');
Route::post('/{payment}/refuse_payment', 'AdminController@refuse_payment')->name('refuse_payment');
