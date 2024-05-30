<?php

namespace App\Http\Controllers;

use App\User;
use App\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$dosen = User::where('role', 'dpl')
							->join('dosen', 'users.user_id', '=', 'dosen.user_id')
							->get();
			// dd($dosen);

		return view('dosen.index', compact('dosen'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
	return view('dosen.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
	$request->validate([
		'kode_prodi' => 'required',
		'nama_prodi' => 'required',
		'fakultas' => 'required'
	]);

	$newProdi = new User([
		'kode_prodi' => $request->get('kode_prodi'),
		'nama_prodi' => $request->get('nama_prodi'),
		'kaprodi' => $request->get('kaprodi'),
		'sekprodi' => $request->get('sekprodi'),
		'fakultas' => $request->get('fakultas'),
	]);
	$newProdi->save();

	return redirect('/dosen')->with('success', 'Tambah User berhasil!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $dosen
	 * @return \Illuminate\Http\Response
	 */
	public function show($dosen)
	{
			//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $dosen
	 * @return \Illuminate\Http\Response
	 */
	public function edit($dosen)
	{
		$dosen = Dosen::find($dosen);
		// dd($dosen);
		
		return view('dosen.edit', compact('dosen'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $dosen
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $dosen)
	{
		// dd($request);
		$request->validate([
			'nidn' => 'required|unique:dosen|max:10',
			'nip' => 'required|unique:dosen|max:20',
			'nama_lengkap' => 'required',
			'fakultas' => 'required',
			'prodi' => 'required',
			'telp' => 'required|unique:dosen|max:15',
		]);

		$dosen = Dosen::find($dosen);
		$dosen->nidn =  $request->get('nidn');
		$dosen->nip = $request->get('nip');
		$dosen->nama_lengkap = $request->get('nama_lengkap');
		$dosen->gelar_depan = $request->get('gelar_depan');
		$dosen->gelar_belakang = $request->get('gelar_belakang');
		$dosen->pangkat = $request->get('pangkat');
		$dosen->golongan = $request->get('golongan');
		$dosen->fakultas = $request->get('fakultas');
		$dosen->prodi = $request->get('prodi');
		$dosen->telp = $request->get('telp');
		$dosen->alamat = $request->get('alamat');
		$dosen->save();

		return redirect('/dosen')->with('success', 'User berhasil diubah!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $dosen
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($dosen)
	{
		$dosen = Dosen::find($dosen);
		$dosen->delete();
		
		return redirect('/dosen')->with('success', 'User berhasil dihapus!');
	}
}
