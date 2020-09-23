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

Route::get('/', function () {
    return view('welcome');
});

Route::get('ongkir','OngkirController@index');
Route::post('cek-ongkir', ['uses'=>'OngkirController@cek_ongkir', 'as'=>'cek.ongkir']);
Route::get('get-kota/{q?}', ['uses'=>'KotaController@get_kota', 'as'=>'get.kota']);