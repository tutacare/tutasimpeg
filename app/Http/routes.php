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
Route::get('testing/2/3', 'KartuIndukPegawaiController@testing');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
