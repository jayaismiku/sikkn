<?php

use Illuminate\Support\Facades\Route;
// use MahasiswaController;

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

// Route::get('admin/login', 'Auth\AdminAuthController@getLogin')->name('admin.login');
// Route::post('admin/login', 'Auth\AdminAuthController@postLogin');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'ProfileController@index')->name('profile');

Route::resource('/fakultas', FakultasController::class);
Route::resource('/prodi', ProdiController::class);
Route::resource('/dosen', DosenController::class);
Route::resource('/mahasiswa', MahasiswaController::class);
Route::resource('/pemonev', PemonevController::class);
Route::resource('/panitia', PanitiaController::class);
Route::resource('/pendamping', PendampingController::class);
Route::resource('/desa', DesaController::class);
Route::resource('/perangkat', PerangkatDesaController::class);
Route::resource('/kelompok', KelompokController::class);
Route::resource('/logbook', LogbookController::class);
Route::resource('/laporan', LaporanController::class);
Route::resource('/post', PostController::class);


Route::get('/broadcastmessage', 'broadcastmessageController@index')->name('broadcastmessage');
// Route::get('/admin', 'AdminController@index')->name('admin')->middleware('admin');
// Route::get('/desa', 'DesaController@index')->name('desa');
// Route::get('/lembaga', 'LembagaController@index')->name('lembaga')->middleware('lembaga');
// Route::get('/panitia', 'PanitiaController@index')->name('panitia');
// Route::get('/timpemonev', 'TimpemonevController@index')->name('timpemonev');
// Route::get('/editpanitia', 'EditpanitiaController@index')->name('editpanitia');
// Route::get('/pendamping', 'PendampingController@index')->name('pendamping')->middleware('pendamping');
