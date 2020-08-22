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
    return view('layouts.app');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'DashboardController@index')->name('dashboard');
Route::get('/data-warga', 'WargaController@data')->name('data-warga');
Route::get('/warga', 'WargaController@index')->name('warga-index');
Route::post('/warga', 'WargaController@store')->name('warga-store');
Route::get('/warga/{id}', 'WargaController@edit')->name('warga-edit');
Route::put('/warga', 'WargaController@update')->name('warga-update');
Route::post('warga/hapus/{id}', 'WargaController@destroy')->name('warga.destroy');