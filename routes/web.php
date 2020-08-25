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
Route::get('/login', 'Auth\LoginController@showLoginForm');
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'DashboardController@index')->name('dashboard');
Route::get('/data-penduduk', 'PendudukController@data')->name('penduduk-data');
Route::get('/penduduk', 'PendudukController@index')->name('penduduk-index');
Route::post('/penduduk', 'PendudukController@store')->name('penduduk-store');
Route::get('/penduduk/{id}', 'PendudukController@edit')->name('penduduk-edit');
Route::put('/penduduk', 'PendudukController@update')->name('penduduk-update');
Route::post('penduduk/hapus/{id}', 'pendudukController@destroy')->name('penduduk-destroy');

Route::get('/data-pj', 'PjController@data')->name('pj-data');
Route::get('/pj', 'PjController@index')->name('pj-index');
Route::post('/pj', 'PjController@store')->name('pj-store');
Route::get('/pj/{id}', 'PjController@edit')->name('pj-edit');
Route::put('/pj', 'PjController@update')->name('pj-update');
Route::post('pj/hapus/{id}', 'pjController@destroy')->name('pj-destroy');