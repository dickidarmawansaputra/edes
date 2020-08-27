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
Route::namespace('Auth')->group(function () {
	Route::get('/', 'LoginController@showLoginForm');
	Route::post('login', 'LoginController@login')->name('login');
	Route::post('logout', 'LoginController@logout')->name('logout');
});
Route::middleware('auth')->group(function () {
	Route::get('dashboard', 'DashboardController@index')->name('dashboard');

	Route::get('pj', 'PjController@index')->name('pj');
	Route::get('pj/data', 'PjController@data')->name('pj.data');
	Route::post('pj/store', 'PjController@store')->name('pj.store');
	Route::put('pj/update', 'PjController@update')->name('pj.update');
	Route::post('pj/destroy/{id}', 'pjController@destroy')->name('pj.destroy');

	Route::get('penduduk', 'PendudukController@index')->name('penduduk');
	Route::get('penduduk/data', 'PendudukController@data')->name('penduduk.data');
	Route::post('penduduk/store', 'PendudukController@store')->name('penduduk.store');
	Route::post('penduduk/update', 'PendudukController@update')->name('penduduk.update');
	Route::post('penduduk/destroy', 'PendudukController@destroy')->name('penduduk.destroy');

	Route::get('pengguna', 'UserController@index')->name('pengguna');
	Route::get('pengguna/data', 'UserController@data')->name('pengguna.data');
	Route::post('pengguna/store', 'UserController@store')->name('pengguna.store');
	Route::put('pengguna/update', 'UserController@update')->name('pengguna.update');
	Route::post('pengguna/destroy/{id}', 'UserController@destroy')->name('pengguna.destroy');
});
Route::get('/data-warga', 'WargaController@data')->name('data-warga');
Route::get('/warga', 'WargaController@index')->name('warga-index');
Route::post('/warga', 'WargaController@store')->name('warga-store');
Route::get('/warga/{id}', 'WargaController@edit')->name('warga-edit');
Route::put('/warga', 'WargaController@update')->name('warga-update');
Route::post('warga/hapus/{id}', 'WargaController@destroy')->name('warga.destroy');



Route::get('surat', 'SuratController@index')->name('surat');
Route::get('surat/data', 'SuratController@data')->name('surat.data');
Route::post('surat/store', 'SuratController@store')->name('surat.store');
Route::put('surat/update', 'SuratController@update')->name('surat.update');
Route::post('surat/destroy/{id}', 'SuratController@destroy')->name('surat.destroy');

Route::get('datasurat', 'DataSuratController@index')->name('datasurat');
Route::get('datasurat/data', 'DataSuratController@data')->name('datasurat.data');
Route::post('datasurat/store', 'DataSuratController@store')->name('datasurat.store');
Route::post('datasurat/update', 'DataSuratController@update')->name('datasurat.update');
Route::post('datasurat/destroy', 'DataSuratController@destroy')->name('datasurat.destroy');
Route::get('/data-penduduk', 'PendudukController@data')->name('penduduk-data');
Route::get('/penduduk', 'PendudukController@index')->name('penduduk-index');
Route::post('/penduduk', 'PendudukController@store')->name('penduduk-store');
Route::get('/penduduk/{id}', 'PendudukController@edit')->name('penduduk-edit');
Route::put('/penduduk', 'PendudukController@update')->name('penduduk-update');
Route::post('penduduk/hapus/{id}', 'pendudukController@destroy')->name('penduduk-destroy');
