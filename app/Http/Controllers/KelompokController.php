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
		return view('kelompok.index', compact('kelompok'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$pemonev = Pemonev::all();
		$pendamping = Pendamping::leftjoin('dosen', 'pendamping.dosen_id', '=', 'dosen.dosen_id')->get();
		$desa = Desa::all();

		return view('kelompok.create', compact('pemonev','pendamping','desa'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		// dd($request->get('desa'));
		$request->validate([
			'nama_kelompok' => 'required',
			'jenis_kkn' => 'required',
			'pemonev' => 'required',
			'pendamping' => 'required',
			'desa' => 'required'
		]);

		$simpanKelompok = new Kelompok([
			'nama_kelompok' => $request->get('nama_kelompok'),
			'jenis_kkn' => $request->get('jenis_kkn'),
			'pemonev_id' => $request->get('pemonev'),
			'pendamping_id' => $request->get('pendamping'),
			'desa_id' => $request->get('desa'),
		]);
		$simpanKelompok->save();

		return redirect('/kelompok')->with('success', 'Tambah Kelompok berhasil!');
	}

	public function storeapi(Request $request)
	{
		// $data = $request->all();
		$data = $request->input('data');
		// dd($data);
		$nama_kelompok = "";
		$kelompok_id = 0;

		if (!empty($data)) {
			foreach ($data as $row) {
				$kelompok = $row['kelompok'];
				$nim = $row['nim'];

				$pengelompokan = new Pengelompokan([
					'nim' => $row['nim'],
					'kelompok_id' => $row['kelompok'],
				]);
				$newProdi->save();
			}
		}
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
		$pemonev = Pemonev::all();
		$pendamping = Pendamping::leftjoin('dosen', 'pendamping.dosen_id', '=', 'dosen.dosen_id')->get();
		$desa = Desa::all();
		// dd($desa);

		return view('kelompok.edit', compact('kelompok','pemonev','pendamping','desa'));
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
			'jenis_kkn' => 'required',
			'pendamping' => 'required',
			'pemonev' => 'required',
			'desa' => 'required',
		]);

		$kelompok = Kelompok::find($id);
		$kelompok->nama_kelompok =  $request->get('nama_kelompok');
		$kelompok->jenis_kkn =  $request->get('jenis_kkn');
		$kelompok->pendamping_id = $request->get('pendamping');
		$kelompok->pemonev_id = $request->get('pemonev');
		$kelompok->desa_id = $request->get('desa');
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
