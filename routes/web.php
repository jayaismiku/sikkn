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
// Pendaftaran User
Route::get('/pendaftaran', 'PendaftaranController@index')->name('daftar');
Route::get('/pendaftaran/panitia', 'PendaftaranController@panitia')->name('daftar.panitia');
Route::post('/pendaftaran/panitia', 'PendaftaranController@storepanitia')->name('daftar.panitia.store');
Route::get('/pendaftaran/pemonev', 'PendaftaranController@pemonev')->name('daftar.pemonev');
Route::post('/pendaftaran/pemonev', 'PendaftaranController@storepemonev')->name('daftar.pemonev.store');
Route::get('/pendaftaran/dpl', 'PendaftaranController@dpl')->name('daftar.dpl');
Route::post('/pendaftaran/dpl', 'PendaftaranController@storedpl')->name('daftar.dpl.store');
Route::get('/pendaftaran/mahasiswa', 'PendaftaranController@mahasiswa')->name('daftar.mahasiswa');
Route::post('/pendaftaran/mahasiswa', 'PendaftaranController@storemahasiswa')->name('daftar.mahasiswa.store');
Route::get('/pendaftaran/sukses', 'PendaftaranController@sukses')->name('daftar.sukses');


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

# Custom Route
Route::put('/mahasiswa/{mahasiswa}', 'MahasiswaController@verify')->name('mahasiswa.verify');
Route::get('/broadcastmessage', 'broadcastmessageController@index')->name('broadcastmessage');
Route::get('/profil/panitia', 'ProfileController@panitia')->name('profil.penitia');
Route::get('/profil/pemonev', 'ProfileController@pemonev')->name('profil.pemonev');
Route::get('/profil/dpl', 'ProfileController@dpl')->name('profil.dpl');
Route::get('/profil/mahasiswa', 'ProfileController@mahasiswa')->name('profil.mahasiswa');
// Route::get('/admin', 'AdminController@index')->name('admin')->middleware('admin');
// Route::get('/desa', 'DesaController@index')->name('desa');
// Route::get('/lembaga', 'LembagaController@index')->name('lembaga')->middleware('lembaga');
// Route::get('/panitia', 'PanitiaController@index')->name('panitia');
// Route::get('/timpemonev', 'TimpemonevController@index')->name('timpemonev');
// Route::get('/editpanitia', 'EditpanitiaController@index')->name('editpanitia');
// Route::get('/pendamping', 'PendampingController@index')->name('pendamping')->middleware('pendamping');
