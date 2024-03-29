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

Route::get('obatResep/{id}','API\ObatResepController@getIdObatResep');
Route::get('getJadwal/{id}','API\ObatResepController@getJadwalObatResep');
Route::post('ubahWaktuMakan/{id}','API\ObatResepController@ubahWaktuMakan');
Route::post('ubahWaktuMinum/{id}','API\ObatResepController@ubahWaktuMinum');
Route::post('tambahWaktuMakan','API\ObatResepController@tambahWaktuMakan');
Route::post('tambahWaktuMinum','API\ObatResepController@tambahWaktuMinum');
Route::delete('hapusWaktuMakan/{id}', 'API\ObatResepController@destroyWaktuMakan');
Route::delete('hapusWaktuMinum/{id}', 'API\ObatResepController@destroyWaktuMinum');



