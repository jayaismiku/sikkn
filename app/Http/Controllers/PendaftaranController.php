<?php

namespace App\Http\Controllers;

use Auth;
use Storage;
use App\User;
use App\Pendamping;
use App\Mahasiswa;
use App\Fakultas;
use App\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PendaftaranController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest');
	}

	public function index()
	{	
		return view('pendaftaran.index');
	}

	public function sukses()
	{	
		return view('pendaftaran.sukses');
	}

	public function panitia()
	{
		return view('pendaftaran.underconstruction');
	}

	public function storepanitia(Request $request)
	{
		$request->validate([
			'kode_prodi' => 'required',
		]);

		$newData = new Prodi([
			'kode_prodi' => $request->get('kode_prodi'),
		]);
		$newData->save();

		return redirect('/')->with('success', 'Pendaftaran Panitia berhasil!');
	}

	public function pemonev()
	{
		return view('pendaftaran.underconstruction');
	}

	public function storepemonev(Request $request)
	{
		$request->validate([
			'kode_prodi' => 'required',
		]);

		$newData = new Prodi([
			'kode_prodi' => $request->get('kode_prodi'),
		]);
		$newData->save();

		return redirect('/')->with('success', 'Pendaftaran Panitia berhasil!');
	}

	public function dpl()
	{
		return view('pendaftaran.underconstruction');
	}

	public function storedpl(Request $request)
	{
		$request->validate([
			'kode_prodi' => 'required',
		]);

		$newData = new Prodi([
			'kode_prodi' => $request->get('kode_prodi'),
		]);
		$newData->save();

		return redirect('/')->with('success', 'Pendaftaran Panitia berhasil!');
	}

	public function mahasiswa()
	{
		$fakultas = DB::table('fakultas')->select('kode_fakultas', 'nama_fakultas')->get();
		$prodi = DB::table('prodi')->select('kode_prodi', 'nama_prodi')->get();
		// dd($prodi);
		
		return view('pendaftaran.mahasiswa', compact('fakultas', 'prodi'));
	}

	public function storemahasiswa(Request $request)
	{
		// dd($request);
		$request->validate([
			'nim' => 'required|unique:mahasiswa|max:15',
			'namalengkap' => 'required',
			'jenis_kelamin' => 'required',
			'telp' => 'required|unique:mahasiswa|max:15',
			'email' => 'required|unique:users',
			'password' => 'required',
			'fakultas' => 'required',
			'prodi' => 'required',
			'semester' => 'required',
			'jenis_kkn' => 'required',
			'nama_ortu' => 'required',
			'telp_ortu' => 'required|unique:mahasiswa|max:15',
			'unggahkrs' => 'required|image|mimes:jpg,jpeg,png,pdf|max:5120',
			'unggahukt' => 'required|image|mimes:jpg,jpeg,png,pdf|max:5120',
			'unggahbiaya' => 'required|image|mimes:jpg,jpeg,png,pdf|max:5120',
			'suratkesediaan' => 'required|image|mimes:pdf,jpeg,png,jpg|max:5120',
			'suratijinortu' => 'required|image|mimes:pdf,jpeg,png,jpg|max:5120',
			'unggahsuratsakit' => 'image|mimes:pdf,jpeg,png,jpg|max:5120',
		]);

		$rootUnggah = 'mahasiswa/' . $request->get('nim') . '/';
		// dd($rootUnggah);
		if ($request->file('unggahkrs')) {
			$fileKRS = $request->file('unggahkrs');
			$fileNameKRS = $fileKRS->getClientOriginalName();
			$filePathKRS = $rootUnggah . $fileNameKRS;
			Storage::disk('public')->put($filePathKRS, file_get_contents($fileKRS));
		}

		if ($request->file('unggahukt')) {
			$fileUKT = $request->file('unggahukt');
			$fileNameUKT = $fileUKT->getClientOriginalName();
			$filePathUKT = $rootUnggah . $fileNameUKT;
			Storage::disk('public')->put($filePathUKT, file_get_contents($fileUKT));
		}

		if ($request->file('unggahbiaya')) {
			$fileBiaya = $request->file('unggahbiaya');
			$fileNameBiaya = $fileBiaya->getClientOriginalName();
			$filePathBiaya = $rootUnggah . $fileNameBiaya;
			Storage::disk('public')->put($filePathBiaya, file_get_contents($fileBiaya));
		}

		if ($request->file('suratkesediaan')) {
			$fileKesediaan = $request->file('suratkesediaan');
			$fileNameKesediaan = $fileKesediaan->getClientOriginalName();
			$filePathKesediaan = $rootUnggah . $fileNameKesediaan;
			Storage::disk('public')->put($filePathKesediaan, file_get_contents($fileKesediaan));
		}

		if ($request->file('suratijinortu')) {
			$fileIjinOrtu = $request->file('suratijinortu');
			$fileNameIjinOrtu = $fileIjinOrtu->getClientOriginalName();
			$filePathIjinOrtu = $rootUnggah . $fileNameIjinOrtu;
			Storage::disk('public')->put($filePathIjinOrtu, file_get_contents($fileIjinOrtu));
		}

		if ($request->file('unggahsuratsakit')) {
			$fileSuratSakit = $request->file('unggahsuratsakit');
			$fileNameSuratSakit = $fileSuratSakit->getClientOriginalName();
			$filePathSuratSakit = $rootUnggah . $fileNameSuratSakit;
			Storage::disk('public')->put($filePathSuratSakit, file_get_contents($fileSuratSakit));
		}

		// $path_storage = 'files/' . $request->get('nim');

		// if ($request->file('unggahkrs')->getClientOriginalName()) {
		// 	$name_krs = $request->file('unggahkrs')->getClientOriginalName();
		// 	$path_krs = $request->file('unggahkrs')->store($path_storage);
		// }
		// if ($request->file('unggahbiaya')->getClientOriginalName()) {
		// 	$name_bayar = $request->file('unggahbiaya')->getClientOriginalName();
		// 	$path_bayar = $request->file('unggahbiaya')->store($path_storage);
		// }
		// if ($request->file('unggahukt')->getClientOriginalName()) {
		// 	$name_ukt = $request->file('unggahukt')->getClientOriginalName();
		// 	$path_ukt = $request->file('unggahukt')->store($path_storage);
		// }
		// if ($request->file('suratkesediaan')->getClientOriginalName()) {
		// 	$name_kesediaan = $request->file('suratkesediaan')->getClientOriginalName();
		// 	$path_kesediaan = $request->file('suratkesediaan')->store($path_storage);
		// }
		// if ($request->file('suratijinortu')->getClientOriginalName()) {
		// 	$name_ijinortu = $request->file('suratijinortu')->getClientOriginalName();
		// 	$path_ijinortu = $request->file('suratijinortu')->store($path_storage);
		// }
		// if ($request->file('unggahsuratsakit')->getClientOriginalName()) {
		// 	$name_sakit = $request->file('unggahsuratsakit')->getClientOriginalName();
		// 	$path_sakit = $request->file('unggahsuratsakit')->store($path_storage);
		// }
		// dd($path_krs);

		// $fname = explode(" ", $request->get('namalengkap'));
		// $length = 4; // Set the desired length of your alphanumeric string
		// $bytes = random_bytes($length);
		// $alphanumericString = bin2hex($bytes);
		// // echo $alphanumericString;
		// $username = $fname[0] . '-' . $alphanumericString;

		$newUser = new User([
			'username' => $request->get('username'),
			'email' => $request->get('email'),
			'password' => Hash::make($request->get('password')),
			'role' => $request->get('role'),
			'created_at' => date('Y-m-d H:i:s'),
			'update_at' => date('Y-m-d H:i:s'),
		]);
		$newUser->save();

		$lastInsertId = $newUser->user_id;
		// dd($lastInsertId);

		$newMahasiswa = Mahasiswa::create([
			'nim' => $request->get('nim'),
			'nama_lengkap' => $request->get('namalengkap'),
			'jenis_kelamin' => $request->get('jenis_kelamin'),
			'alamat' => $request->get('alamat'),
			'telp' => $request->get('telp'),
			'fakultas' => $request->get('fakultas'),
			'prodi' => $request->get('prodi'),
			'semester' => $request->get('semester'),
			'jenis_kkn' => $request->get('jenis_kkn'),
			'unggah_krs' => $filePathKRS,
			'unggah_biaya' => $filePathBiaya,
			'unggah_ukt' => $filePathUKT,
			'unggah_surat_kesediaan' => $filePathKesediaan,
			'unggah_surat_ijin_ortu' => $filePathIjinOrtu,
			'sakit_berat' => $filePathSuratSakit,
			'alergi' => $request->get('alergi'),
			'nama_ortu' => $request->get('nama_ortu_wali'),
			'telp_ortu' => $request->get('telp_ortu_wali'),
			'user_id' => $lastInsertId,
		]);
		$newMahasiswa->save();

		return redirect('/pendaftaran/sukses')->with('success', 'Pendaftaran Mahasiswa berhasil!');
	}


}
