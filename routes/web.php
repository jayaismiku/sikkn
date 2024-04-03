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

Auth::routes();

Route::get('admin/login', 'Auth\AdminAuthController@getLogin')->name('admin.login');
Route::post('admin/login', 'Auth\AdminAuthController@postLogin');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'ProfileController@index')->name('profile');

Route::get('/desa', 'DesaController@index')->name('desa')->middleware('desa');
Route::get('/lembaga', 'LembagaController@index')->name('lembaga')->middleware('lembaga');
Route::get('/mahasiswa', 'MahasiswaController@index')->name('mahasiswa')->middleware('mahasiswa');
Route::get('/panitia', 'PanitiaController@index')->name('panitia')->middleware('panitia');
Route::get('/pendamping', 'PendampingController@index')->name('pendamping')->middleware('pendamping');
