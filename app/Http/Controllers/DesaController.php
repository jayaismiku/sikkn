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
		$desa = Desa::leftjoin('provinsi', 'desa.provinsi_id', '=', 'provinsi.provinsi_id')
					->leftjoin('kota', 'desa.kota_id', '=', 'kota.kota_id')
					->leftjoin('kecamatan', 'desa.kecamatan_id', '=', 'kecamatan.kecamatan_id')
					->leftjoin('kelurahan', 'desa.kelurahan_id', '=', 'kelurahan.kelurahan_id')
					->get(['desa.*', 'provinsi.nama_provinsi', 'kota.nama_kota', 'kecamatan.nama_kecamatan', 'kelurahan.nama_kelurahan']);
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
		// dd($request);
		$request->validate([
			'nama_desa' => 'required',
			'alamat' => 'required',
			// 'provinsi' => 'required',
			// 'kota' => 'required',
			// 'kecamatan' => 'required',
			// 'kelurahan' => 'required',
		]);

		$TambahDesa = new Desa([
			'nama_desa' => $request->get('nama_desa'),
			'alamat' => $request->get('alamat'),
			'provinsi_id' => $request->get('provinsi'),
			'kota_id' => $request->get('kota'),
			'kecamatan_id' => $request->get('kecamatan'),
			'kelurahan_id' => $request->get('kelurahan'),
			'longitude' => $request->get('longitude'),
			'latitude' => $request->get('latitude'),
		]);
		$TambahDesa->save();

		return redirect()->route('desa.index')->with('success', 'Tambah Desa berhasil!');
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
		$desa = Desa::leftjoin('provinsi', 'desa.provinsi_id', '=', 'provinsi.provinsi_id')
					->leftjoin('kota', 'desa.kota_id', '=', 'kota.kota_id')
					->leftjoin('kecamatan', 'desa.kecamatan_id', '=', 'kecamatan.kecamatan_id')
					->leftjoin('kelurahan', 'desa.kelurahan_id', '=', 'kelurahan.kelurahan_id')
					->where('desa.desa_id', '=', $id)
					->first(['desa.*', 'provinsi.nama_provinsi', 'kota.nama_kota', 'kecamatan.nama_kecamatan', 'kelurahan.nama_kelurahan']);
		
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
		$desa->provinsi_id = $request->get('provinsi');
		$desa->kota_id = $request->get('kota');
		$desa->kecamatan_id = $request->get('kecamatan');
		$desa->kelurahan_id = $request->get('kelurahan');
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
