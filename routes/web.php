<?php

use Illuminate\Support\Facades\Route;
// use MahasiswaController;
use App\Http\Middleware\Mahasiswa;

// use App\Http\Controllers\MahasiswaController;

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

Route::middleware('auth')->group(function(){
	Route::get('/home', 'HomeController@index')->name('home');
	Route::resource('/fakultas', FakultasController::class);
	Route::resource('/prodi', ProdiController::class);
	Route::resource('/dosen', DosenController::class);
});

Route::middleware('auth')->group(function(){
	Route::resource('/panitia', PanitiaController::class);
	Route::resource('/desa', DesaController::class);
	Route::resource('/perangkat', PerangkatDesaController::class);
	Route::resource('/post', PostController::class);
	Route::put('/mahasiswa/{mahasiswa}/verify', 'MahasiswaController@verify')->name('mahasiswa.verify');
	Route::get('/profil/panitia', 'ProfileController@panitia')->name('profil.penitia');
});

Route::middleware('auth')->group(function(){
	Route::resource('/pemonev', PemonevController::class);
	Route::get('/profil/pemonev', 'ProfileController@pemonev')->name('profil.pemonev');
});

Route::middleware('auth')->group(function(){
	Route::resource('/pendamping', PendampingController::class);
	Route::get('/profil/dpl', 'ProfileController@dpl')->name('profil.dpl');
});

Route::middleware(['auth', 'mahasiswa'])->group(function(){
	Route::resource('/mahasiswa', MahasiswaController::class);
	Route::resource('/kelompok', KelompokController::class);
	Route::resource('/logbook', LogbookController::class);
	Route::resource('/laporan', LaporanController::class);
	Route::get('/profil/mahasiswa', 'ProfileController@mahasiswa')->name('profil.mahasiswa');
});

# Custom Route
Route::get('/broadcastmessage', 'broadcastmessageController@index')->name('broadcastmessage');
// Route::get('/admin', 'AdminController@index')->name('admin')->middleware('admin');
// Route::get('/desa', 'DesaController@index')->name('desa');
// Route::get('/lembaga', 'LembagaController@index')->name('lembaga')->middleware('lembaga');
// Route::get('/panitia', 'PanitiaController@index')->name('panitia');
// Route::get('/timpemonev', 'TimpemonevController@index')->name('timpemonev');
// Route::get('/editpanitia', 'EditpanitiaController@index')->name('editpanitia');
// Route::get('/pendamping', 'PendampingController@index')->name('pendamping')->middleware('pendamping');
