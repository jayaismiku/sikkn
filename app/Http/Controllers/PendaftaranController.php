<?php

namespace App\Http\Controllers;

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
		// $request->validate([
		// 	'email' => 'required|unique:users',
		// 	'password' => 'required',
		// 	'nim' => 'required|unique:mahasiswa|max:20',
		// 	'nama_lengkap' => 'required',
		// 	'fakultas' => 'required',
		// 	'prodi' => 'required',
		// 	'semester' => 'required',
		// 	'telp' => 'required|unique:mahasiswa|max:15',
		// 	'krs' => 'required|image|max:2048',
		// 	'bayar' => 'required|image|max:2048',
		// 	'ukt' => 'required|image|max:2048',
		// 	'sakit' => 'image|max:2048',
		// ]);

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
		// if ($request->file('unggahsuratsakit')->getClientOriginalName()) {
		// 	$name_sakit = $request->file('unggahsuratsakit')->getClientOriginalName();
		// 	$path_sakit = $request->file('unggahsuratsakit')->store($path_storage);
		// }
		// dd($path);

		// $fname = explode(" ", $request->get('namalengkap'));
		// $length = 4; // Set the desired length of your alphanumeric string
		// $bytes = random_bytes($length);
		// $alphanumericString = bin2hex($bytes);
		// // echo $alphanumericString;
		// $username = $fname[0] . '-' . $alphanumericString;

		$path_storage = 'files/' . $request->get('nim');

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
			'alamat' => $request->get('alamat'),
			'telp' => $request->get('telp'),
			'fakultas' => $request->get('fakultas'),
			'prodi' => $request->get('prodi'),
			'semester' => $request->get('semester'),
			'unggah_krs' => $request->get('unggahkrs'),
			'unggah_keuangan' => $request->get('unggahbiaya'),
			'unggah_ukt' => $request->get('unggahukt'),
			'sakit_berat' => $request->get('unggahsuratsakit'),
			'alergi' => $request->get('alergi'),
			'user_id' => $lastInsertId,
		]);
		$newMahasiswa->save();

		return redirect('/pendaftaran/sukses')->with('success', 'Pendaftaran Mahasiswa berhasil!');
	}


}
