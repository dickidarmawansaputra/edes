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
//     return view('layouts.apps');
// });

Auth::routes();
// Route::get('/login', 'DashboardController@index')->name('dashboard');
// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'DashboardController@index')->name('dashboard');
Route::get('/data-penduduk', 'PendudukController@data')->name('penduduk-data');
Route::get('/penduduk', 'PendudukController@index')->name('penduduk-index');
Route::post('/penduduk', 'PendudukController@store')->name('penduduk-store');
Route::get('/penduduk/{id}', 'PendudukController@edit')->name('penduduk-edit');
Route::put('/warga', 'WargaController@update')->name('warga-update');
Route::post('warga/hapus/{id}', 'WargaController@destroy')->name('warga.destroy');