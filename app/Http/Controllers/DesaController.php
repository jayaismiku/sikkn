<?php

namespace App\Http\Controllers;

use App\Desa;
use App\Provinsi;
use App\Kota;
use App\Kecamatan;
use App\Kelurahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DesaController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$desa = Desa::paginate(10);
		// dd($desa);
		return view('desa.index', compact('desa'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$provinsi = Provinsi::all()->where('status', '1');

		return view('desa.create', compact('provinsi'));
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

		$newProdi = new Desa([
			'kode_prodi' => $request->get('kode_prodi'),
			'nama_prodi' => $request->get('nama_prodi'),
			'kaprodi' => $request->get('kaprodi'),
			'sekprodi' => $request->get('sekprodi'),
			'fakultas' => $request->get('fakultas'),
		]);
		$newProdi->save();

		return redirect('/desa')->with('success', 'Tambah Desa berhasil!');
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
		$desa = Desa::find($id);
		$provinsi = Provinsi::all()->where('status', '1');
		// dd($desa);
		return view('desa.edit', compact('desa'));
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
			'nama_desa' => 'required',
			'alamat' => 'required',
			'longitude' => 'required',
			'latitude' => 'required',
		]);

		$desa = Desa::find($id);
		$desa->nama_desa =  $request->get('nama_desa');
		$desa->alamat = $request->get('alamat');
		$desa->longitude = $request->get('longitude');
		$desa->latitude = $request->get('latitude');
		$desa->updated_at = date('Y-m-d H:i:s');
		$desa->save();

		return redirect('/desa')->with('success', 'Desa berhasil diubah!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$desa = Desa::find($id);
		$desa->delete();
		
		return redirect('/desa')->with('success', 'Desa berhasil dihapus!');
	}
}
