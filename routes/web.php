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

Route::get('penduduk', 'PendudukController@index')->name('penduduk');
Route::get('penduduk/data', 'PendudukController@data')->name('penduduk.data');
Route::post('penduduk/store', 'PendudukController@store')->name('penduduk.store');
Route::post('penduduk/update', 'PendudukController@update')->name('penduduk.update');
Route::post('penduduk/destroy', 'PendudukController@destroy')->name('penduduk.destroy');

Route::get('surat', 'SuratController@index')->name('surat');
Route::get('surat/data', 'SuratController@data')->name('surat.data');
Route::post('surat/store', 'SuratController@store')->name('surat.store');
Route::post('surat/update', 'SuratController@update')->name('surat.update');
Route::post('surat/destroy', 'SuratController@destroy')->name('surat.destroy');

Route::get('datasurat', 'DataSuratController@index')->name('datasurat');
Route::get('datasurat/data', 'DataSuratController@data')->name('datasurat.data');
Route::post('datasurat/store', 'DataSuratController@store')->name('datasurat.store');
Route::post('datasurat/update', 'DataSuratController@update')->name('datasurat.update');
Route::post('datasurat/destroy', 'DataSuratController@destroy')->name('datasurat.destroy');
