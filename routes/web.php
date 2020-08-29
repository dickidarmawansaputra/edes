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
	Route::post('pj/destroy/{id}', 'PjController@destroy')->name('pj.destroy');

	Route::get('surat', 'SuratController@index')->name('surat');
	Route::get('surat/data', 'SuratController@data')->name('surat.data');
	Route::post('surat/store', 'SuratController@store')->name('surat.store');
	Route::put('surat/update', 'SuratController@update')->name('surat.update');
	Route::post('surat/destroy/{id}', 'SuratController@destroy')->name('surat.destroy');

	Route::get('penduduk', 'PendudukController@index')->name('penduduk');
	Route::get('penduduk/data', 'PendudukController@data')->name('penduduk.data');
	Route::post('penduduk/store', 'PendudukController@store')->name('penduduk.store');
	Route::put('penduduk/update', 'PendudukController@update')->name('penduduk.update');
	Route::post('penduduk/destroy/{id}', 'PendudukController@destroy')->name('penduduk.destroy');

	Route::get('pengguna', 'UserController@index')->name('pengguna');
	Route::get('pengguna/data', 'UserController@data')->name('pengguna.data');
	Route::post('pengguna/store', 'UserController@store')->name('pengguna.store');
	Route::put('pengguna/update', 'UserController@update')->name('pengguna.update');
	Route::post('pengguna/destroy/{id}', 'UserController@destroy')->name('pengguna.destroy');

	Route::get('laporan/miskin', 'LaporanController@ketMiskin')->name('miskin');
	Route::get('laporan/data/miskin', 'LaporanController@dataMiskin')->name('miskin.data');
	Route::get('laporan/pdf/miskin/{id}', 'LaporanController@pdfMiskin')->name('miskin.pdf');

	Route::get('laporan/belumnikah', 'LaporanController@ketBelumMenikah')->name('belumnikah');
	Route::get('laporan/data/belumnikah', 'LaporanController@dataBelumMenikah')->name('belumnikah.data');
	Route::get('laporan/pdf/belumnikah/{id}', 'LaporanController@pdfBelumMenikah')->name('belumnikah.pdf');

	Route::get('laporan/kematian', 'LaporanController@ketKematian')->name('kematian');
	Route::get('laporan/data/kematian', 'LaporanController@dataKematian')->name('kematian.data');
	Route::get('laporan/pdf/kematian/{id}', 'LaporanController@pdfKematian')->name('kematian.pdf');

	Route::get('laporan/kelahiran', 'LaporanController@ketKelahiran')->name('kelahiran');
	Route::get('laporan/data/kelahiran', 'LaporanController@dataKelahiran')->name('kelahiran.data');
	Route::get('laporan/pdf/kelahiran/{id}', 'LaporanController@pdfKelahiran')->name('kelahiran.pdf');

	Route::get('laporan/domisili', 'LaporanController@ketDomisili')->name('domisili');
	Route::get('laporan/data/domisili', 'LaporanController@dataDomisili')->name('domisili.data');
	Route::get('laporan/pdf/domisili/{id}', 'LaporanController@pdfDomisili')->name('domisili.pdf');

	Route::get('laporan/usaha', 'LaporanController@ketUsaha')->name('usaha');
	Route::get('laporan/data/usaha', 'LaporanController@dataUsaha')->name('usaha.data');
	Route::get('laporan/pdf/usaha/{id}', 'LaporanController@pdfUsaha')->name('usaha.pdf');

	Route::get('laporan/untuknikah', 'LaporanController@ketUntukNikah')->name('untuknikah');
	Route::get('laporan/data/untuknikah', 'LaporanController@dataUntukNikah')->name('untuknikah.data');
	Route::get('laporan/pdf/untuknikah/{id}', 'LaporanController@pdfUntukNikah')->name('untuknikah.pdf');

	Route::get('laporan/pengantar', 'LaporanController@pengantar')->name('pengantar');
	Route::get('laporan/data/pengantar', 'LaporanController@dataPengantar')->name('pengantar.data');
	Route::get('laporan/pdf/pengantar/{id}', 'LaporanController@pdfPengantar')->name('pengantar.pdf');

	Route::get('laporan/persetujuan', 'LaporanController@persetujuan')->name('persetujuan');
	Route::get('laporan/data/persetujuan', 'LaporanController@dataPersetujuan')->name('persetujuan.data');
	Route::get('laporan/pdf/persetujuan/{id}', 'LaporanController@pdfPersetujuan')->name('persetujuan.pdf');

	Route::get('laporan/izinortu', 'LaporanController@izinOrtu')->name('izinortu');
	Route::get('laporan/data/izinortu', 'LaporanController@dataIzinOrtu')->name('izinortu.data');
	Route::get('laporan/pdf/izinortu/{id}', 'LaporanController@pdfIzinOrtu')->name('izinortu.pdf');

	Route::get('pengaturan', 'PengaturanController@index')->name('pengaturan');
	Route::post('pengaturan/store', 'PengaturanController@pengaturan')->name('pengaturan.store');
});
// Route::get('/data-warga', 'WargaController@data')->name('data-warga');
// Route::get('/warga', 'WargaController@index')->name('warga-index');
// Route::post('/warga', 'WargaController@store')->name('warga-store');
// Route::get('/warga/{id}', 'WargaController@edit')->name('warga-edit');
// Route::put('/warga', 'WargaController@update')->name('warga-update');
// Route::post('warga/hapus/{id}', 'WargaController@destroy')->name('warga.destroy');

// Route::get('datasurat', 'DataSuratController@index')->name('datasurat');
// Route::get('datasurat/data', 'DataSuratController@data')->name('datasurat.data');
// Route::post('datasurat/store', 'DataSuratController@store')->name('datasurat.store');
// Route::post('datasurat/update', 'DataSuratController@update')->name('datasurat.update');
// Route::post('datasurat/destroy', 'DataSuratController@destroy')->name('datasurat.destroy');
// Route::get('/data-penduduk', 'PendudukController@data')->name('penduduk-data');
// Route::get('/penduduk', 'PendudukController@index')->name('penduduk-index');
// Route::post('/penduduk', 'PendudukController@store')->name('penduduk-store');
// Route::get('/penduduk/{id}', 'PendudukController@edit')->name('penduduk-edit');
// Route::put('/penduduk', 'PendudukController@update')->name('penduduk-update');
// Route::post('penduduk/hapus/{id}', 'pendudukController@destroy')->name('penduduk-destroy');
