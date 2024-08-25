<?php

namespace App\Http\Controllers;

use App\Kelompok;
use App\Mahasiswa;
use App\Pengelompokan;
use App\Pendamping;
use App\Pemonev;
use App\Desa;
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
		$kelompok = Kelompok::leftjoin('pendamping', 'kelompok.pendamping_id', '=', 'pendamping.pendamping_id')
						->leftjoin('dosen', 'pendamping.dosen_id', '=', 'dosen.dosen_id')
						->leftjoin('pemonev', 'kelompok.pemonev_id', '=', 'pemonev.pemonev_id')
						->leftjoin('desa', 'kelompok.desa_id', '=', 'desa.desa_id')
						->get(['kelompok.*', 'dosen.nama_dosen', 'desa.nama_desa']);
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
		$pemonev = Pemonev::leftjoin('users', 'pemonev.user_id', '=', 'users.user_id')->get(['pemonev.*', 'users.username']);
		$pendamping = Pendamping::leftjoin('dosen', 'pendamping.dosen_id', '=', 'dosen.dosen_id')->leftjoin('users', 'dosen.user_id', '=', 'users.user_id')->get(['pendamping.*', 'dosen.nama_dosen', 'dosen.nidn', 'users.username']);
		$desa = Desa::all();
		$mahasiswa = Mahasiswa::leftjoin('users', 'mahasiswa.user_id', '=', 'users.user_id')->get(['mahasiswa.*', 'users.username']);

		return view('kelompok.create', compact('pemonev', 'pendamping', 'desa', 'mahasiswa'));
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
		// Validasi input
		$request->validate([
			'nama_kelompok' => 'required|string|max:255',
			'jenis_kkn' => 'required|string|max:255',
			'pemonev' => 'required',
			'pendamping' => 'required',
			'desa' => 'required',
			'mahasiswa' => 'required|array',
		]);

		// Simpan data kelompok ke dalam tabel `kelompok`
		$kelompok = Kelompok::create([
			'nama_kelompok' => $request->nama_kelompok,
			'jenis_kkn' => $request->jenis_kkn,
			'pendamping_id' => $request->id_pendamping,
			'pemonev_id' => $request->id_pemonev,
			'desa_id' => $request->id_desa,
			'mahasiswa_id' => implode(',', $request->mahasiswa),
		]);

		// Simpan setiap nim mahasiswa ke dalam tabel `pengelompokan`
		foreach ($request->mahasiswa as $nim) {
			Pengelompokan::create([
				'nim' => $nim,
				'nama_kelompok' => $kelompok->nama_kelompok,
				'kelompok_id' => $kelompok->kelompok_id, // Menggunakan ID kelompok yang baru dibuat
			]);
		}

		return redirect()->route('kelompok.index')->with('success', 'Kelompok dan pengelompokan berhasil dibuat.');
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
		$pendamping = Pendamping::join('dosen', 'pendamping.dosen_id', '=', 'dosen.dosen_id')->get();
		$desa = Desa::all();
		$mahasiswa = Mahasiswa::leftjoin('users', 'mahasiswa.user_id', '=', 'users.user_id')->get(['mahasiswa.*', 'users.username']);

		return view('kelompok.edit', compact('kelompok','pemonev','pendamping','desa','mahasiswa'));
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
			'nama_kelompok' => 'required|string|max:255',
			'jenis_kkn' => 'required|string|max:255',
			'pemonev' => 'required',
			'pendamping' => 'required',
			'desa' => 'required',
			'mahasiswa' => 'required|array',
		]);

		$kelompok = Kelompok::find($id);
		$kelompok->nama_kelompok =  $request->get('nama_kelompok');
		$kelompok->jenis_kkn =  $request->get('jenis_kkn');
		$kelompok->pendamping_id = $request->get('pendamping');
		$kelompok->pemonev_id = $request->get('pemonev');
		$kelompok->desa_id = $request->get('desa');
		$kelompok->mahasiswa_id = implode(',', $request->mahasiswa);
		$kelompok->updated_at = date('Y-m-d H:i:s');
		$kelompok->save();

		return redirect()->route('kelompok.index')->with('success', 'Kelompok berhasil diubah!');
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
