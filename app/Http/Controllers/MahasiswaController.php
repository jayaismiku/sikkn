<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MahasiswaController extends Controller
{
	public function getMahasiswa()
	{
		$mahasiswa = Mahasiswa::all(['jenis_kkn', 'prodi', 'nim', 'semester', 'nama_lengkap', 'jenis_kelamin']);
		// dd($mahasiswa);
		return response()->json($mahasiswa);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$mahasiswa = Mahasiswa::where('users.role', '=', 'mahasiswa')
								->join('users', 'mahasiswa.user_id', '=', 'users.user_id')
								->get();
		// $mahasiswa = User::join('mahasiswa', 'users.user_id', '=', 'mahasiswa.user_id')
		// 							->where('role', 'mahasiswa')->paginate(10)
		// 							->get();
		// dd($mahasiswa);

		return view('mahasiswa.index', compact('mahasiswa'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('mahasiswa.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$mahasiswa = Mahasiswa::find($id);
		// dd($mahasiswa);
		
		return view('mahasiswa.edit', compact('mahasiswa'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		// dd($request);
		$request->validate([
			'nim' => 'required|unique:mahasiswa|max:20',
			'nama_lengkap' => 'required',
			'fakultas' => 'required',
			'prodi' => 'required',
			'semester' => 'required',
			'telp' => 'required|unique:mahasiswa|max:15',
			'krs' => 'required|image|max:2048',
			'bayar' => 'required|image|max:2048',
			'ukt' => 'required|image|max:2048',
			'sakit' => 'image|max:2048',
		]);

		$path_storage = 'files/' . $request->get('nim');

		if ($request->file('krs')->getClientOriginalName()) {
			$name_krs = $request->file('krs')->getClientOriginalName();
			$path_krs = $request->file('krs')->store($path_storage);
		}
		if ($request->file('bayar')->getClientOriginalName()) {
			$name_bayar = $request->file('bayar')->getClientOriginalName();
			$path_bayar = $request->file('bayar')->store($path_storage);
		}
		if ($request->file('ukt')->getClientOriginalName()) {
			$name_ukt = $request->file('ukt')->getClientOriginalName();
			$path_ukt = $request->file('ukt')->store($path_storage);
		}
		if ($request->file('sakit')->getClientOriginalName()) {
			$name_sakit = $request->file('sakit')->getClientOriginalName();
			$path_sakit = $request->file('sakit')->store($path_storage);
		}
		// dd($path);

		$mahasiswa = Mahasiswa::find($id);
		$mahasiswa->nim =  $request->get('nim');
		$mahasiswa->nama_lengkap = $request->get('nama_lengkap');
		$mahasiswa->alamat = $request->get('alamat');
		$mahasiswa->telp = $request->get('telp');
		$mahasiswa->fakultas = $request->get('fakultas');
		$mahasiswa->prodi = $request->get('prodi');
		$mahasiswa->semester = $request->get('semester');
		$mahasiswa->unggah_krs = $path_krs;
		$mahasiswa->unggah_keuangan = $path_bayar;
		$mahasiswa->unggah_ukt = $path_ukt;
		$mahasiswa->sakit_berat = $path_sakit;
		$mahasiswa->alergi = $request->get('alergi');
		$mahasiswa->save();

		if (Auth::user()->role == 'mahasiswa') {
			return redirect('/profil/mahasiswa')->with('success', 'User berhasil diubah!');
		} else {
			return redirect('/mahasiswa')->with('success', 'User berhasil diubah!');
		}
		

		return redirect('/mahasiswa')->with('success', 'User berhasil diubah!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$mahasiswa = Mahasiswa::find($id);
		$mahasiswa->delete();
		
		return redirect('/mahasiswa')->with('success', 'User berhasil dihapus!');
	}

	public function verify($id)
	{
		$mahasiswa = Mahasiswa::find($id);
		
		return view('mahasiswa.verify', compact('mahasiswa'));
	}

	public function verified($id)
	{
		// dd($id);
		$verify = User::find($id);
		$verify->status = 1;
		$verify->email_verified_at = date('Y-m-d H:i:s');
		$verify->save();

		return redirect('/mahasiswa')->with('success', 'Verifikasi User berhasil!');
	}
}
