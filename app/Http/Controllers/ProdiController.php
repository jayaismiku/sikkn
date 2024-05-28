<?php

namespace App\Http\Controllers;

use App\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$prodi = Prodi::all();

		return view('prodi.index', compact('prodi'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('prodi.create');
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

		$newProdi = new Prodi([
			'kode_prodi' => $request->get('kode_prodi'),
			'nama_prodi' => $request->get('nama_prodi'),
			'kaprodi' => $request->get('kaprodi'),
			'sekprodi' => $request->get('sekprodi'),
			'fakultas' => $request->get('fakultas'),
		]);
		$newProdi->save();

		return redirect('/prodi')->with('success', 'Tambah Prodi berhasil!');
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
	public function edit($prodi)
	{
		$prodi = Prodi::find($prodi);
		
		return view('prodi.edit', compact('prodi'));
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
		$request->validate([
			'kode_fakultas' => 'required',
			'nama_fakultas' => 'required',
		]);

		$prodi = Prodi::find($prodi);
		$prodi->kode_fakultas =  $request->get('kode_fakultas');
		$prodi->nama_fakultas = $request->get('nama_fakultas');
		$prodi->dekan = $request->get('dekan');
		$prodi->wadek = $request->get('wadek');
		$prodi->updated_at = date('Y-m-d H:i:s');
		$prodi->save();

		return redirect('/prodi')->with('success', 'Prodi berhasil diubah!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($prodi)
	{
		$prodi = Prodi::find($prodi);
		$prodi->delete();
		
		return redirect('/prodi')->with('success', 'Prodi berhasil dihapus!');
	}
}
