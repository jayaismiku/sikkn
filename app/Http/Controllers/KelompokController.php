<?php

namespace App\Http\Controllers;

use App\Kelompok;
use App\Mahasiswa;
use Illuminate\Http\Request;

class KelompokController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$mahasiswa = Mahasiswa::paginate(15);
		// dd($kelompok);
		return view('kelompok.index', compact('mahasiswa'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$mahasiswa = Mahasiswa::all(['nim', 'jenis_kelamin', 'prodi']);
		// dd($mahasiswa);
		return view('kelompok.create', compact('mahasiswa'));
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

		$newProdi = new Kelompok([
			'kode_prodi' => $request->get('kode_prodi'),
			'nama_prodi' => $request->get('nama_prodi'),
			'kaprodi' => $request->get('kaprodi'),
			'sekprodi' => $request->get('sekprodi'),
			'fakultas' => $request->get('fakultas'),
		]);
		$newProdi->save();

		return redirect('/kelompok')->with('success', 'Tambah Kelompok berhasil!');
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
		$kelompok = Kelompok::find($id);
		$provinsi = Provinsi::all()->where('status', '1');
		// dd($kelompok);
		return view('kelompok.edit', compact('kelompok'));
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
			'nama_kelompok' => 'required',
			'alamat' => 'required',
			'longitude' => 'required',
			'latitude' => 'required',
		]);

		$kelompok = Kelompok::find($id);
		$kelompok->nama_kelompok =  $request->get('nama_kelompok');
		$kelompok->alamat = $request->get('alamat');
		$kelompok->longitude = $request->get('longitude');
		$kelompok->latitude = $request->get('latitude');
		$kelompok->updated_at = date('Y-m-d H:i:s');
		$kelompok->save();

		return redirect('/kelompok')->with('success', 'Kelompok berhasil diubah!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$kelompok = Kelompok::find($id);
		$kelompok->delete();
		
		return redirect('/kelompok')->with('success', 'Kelompok berhasil dihapus!');
	}
}
