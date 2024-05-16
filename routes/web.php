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
	return view('auth/login');
});

Auth::routes();

Route::get('admin/login', 'Auth\AdminAuthController@getLogin')->name('admin.login');
Route::post('admin/login', 'Auth\AdminAuthController@postLogin');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'ProfileController@index')->name('profile');

Route::get('/editdosen', 'editdosenController@index')->name('editdosen');
Route::get('/datadosen', 'datadosenController@index')->name('datadosen');
Route::get('/datamahasiswa', 'datamahasiswaController@index')->name('datamahasiswa');
Route::get('/broadcastmessage', 'broadcastmessageController@index')->name('broadcastmessage');
Route::get('/admin', 'AdminController@index')->name('admin')->middleware('admin');
Route::get('/desa', 'DesaController@index')->name('desa');
Route::get('/lembaga', 'LembagaController@index')->name('lembaga')->middleware('lembaga');
Route::get('/mahasiswa', 'MahasiswaController@index')->name('mahasiswa')->middleware('mahasiswa');
Route::get('/panitia', 'PanitiaController@index')->name('panitia');
Route::get('/timpemonev', 'TimpemonevController@index')->name('timpemonev');
Route::get('/editpanitia', 'EditpanitiaController@index')->name('editpanitia');
Route::get('/pendamping', 'PendampingController@index')->name('pendamping')->middleware('pendamping');
