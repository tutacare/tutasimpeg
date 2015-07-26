<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'DashboardController@index');

Route::get('dashboard', 'DashboardController@index');
Route::resource('kartu-induk-pegawai', 'KartuIndukPegawaiController');
Route::get('api/kartu-induk-pegawai/{id}', 'KartuIndukPegawaiController@getApi');
Route::get('api/kartu-induk-pegawai', 'KartuIndukPegawaiController@getApiAja');
Route::post('kartu-induk-pegawai/search', 'KartuIndukPegawaiController@search');
Route::get('kartu-induk-pegawai/{id}/jabatan', 'KartuIndukPegawaiController@jabatan');
Route::get('kartu-induk-pegawai/{id}/riwayat', 'KartuIndukPegawaiController@riwayat');
Route::resource('jabatan', 'JabatanController');

Route::resource('riwayat-pendidikan', 'RiwayatPendidikanController');
Route::resource('riwayat-pangkat', 'RiwayatPangkatController');
Route::resource('riwayat-jabatan', 'RiwayatJabatanController');
Route::resource('riwayat-diklat', 'RiwayatDiklatController');
Route::resource('riwayat-suami-istri', 'RiwayatSuamiIstriController');
Route::resource('riwayat-anak', 'RiwayatAnakController');
Route::resource('riwayat-alamat', 'RiwayatAlamatController');

//Route::get('testing/2/3', 'KartuIndukPegawaiController@testing');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
