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

// CRUD Fakultas
Route::get('/fakultas', 'FakultasController@index')->name('fakultas');
Route::get('/fakultas/create', 'FakultasController@create')->name('createFakultas');
Route::post('/fakultas', 'FakultasController@store')->name('storeFakultas');
Route::get('/fakultas/{fakultas}/edit', 'FakultasController@edit')->name('editFakultas');
Route::put('/fakultas/{fakultas}', 'FakultasController@update')->name('updateFakultas');
Route::delete('/fakultas/{fakultas}', 'FakultasController@destroy')->name('deleteFakultas');
// CRUD Program Studi
Route::get('/prodi', 'ProdiController@index')->name('prodi');
Route::get('/prodi/create', 'ProdiController@create')->name('createProdi');
Route::post('/prodi', 'ProdiController@store')->name('storeProdi');
Route::get('/prodi/{prodi}/edit', 'ProdiController@edit')->name('editProdi');
Route::put('/prodi/{prodi}', 'ProdiController@update')->name('updateProdi');
Route::delete('/prodi/{prodi}', 'ProdiController@destroy')->name('deleteProdi');
// CRUD Dosen
Route::get('/dosen', 'DosenController@index')->name('dosen');
Route::get('/dosen/create', 'DosenController@create')->name('createDosen');
Route::post('/dosen', 'DosenController@store')->name('storeDosen');
Route::get('/dosen/{dosen}/edit', 'DosenController@edit')->name('editDosen');
Route::put('/dosen/{dosen}', 'DosenController@update')->name('updateDosen');
Route::delete('/dosen/{dosen}', 'DosenController@destroy')->name('deleteDosen');


Route::get('/broadcastmessage', 'broadcastmessageController@index')->name('broadcastmessage');
Route::get('/admin', 'AdminController@index')->name('admin')->middleware('admin');
Route::get('/desa', 'DesaController@index')->name('desa');
Route::get('/lembaga', 'LembagaController@index')->name('lembaga')->middleware('lembaga');
Route::get('/mahasiswa', 'MahasiswaController@index')->name('mahasiswa')->middleware('mahasiswa');
Route::get('/panitia', 'PanitiaController@index')->name('panitia');
Route::get('/timpemonev', 'TimpemonevController@index')->name('timpemonev');
Route::get('/editpanitia', 'EditpanitiaController@index')->name('editpanitia');
Route::get('/pendamping', 'PendampingController@index')->name('pendamping')->middleware('pendamping');
