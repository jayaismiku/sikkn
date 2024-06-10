<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Mahasiswa;
use App\Laporan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
	protected $nim;

	public function __construct()
	{
		$this->nim = Mahasiswa::join('users', 'mahasiswa.user_id', '=', 'users.user_id')
							->where('users.user_id', Auth::user()->user_id)
							->get('nim')->first();
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$laporan = Laporan::where('nim', $this->nim)->get();
		dd($laporan);

		return view('laporan.index', compact('laporan'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$userid = Auth::user()->user_id;
		$nim = Laporan::join('mahasiswa', 'laporan.nim', '=', 'mahasiswa.nim')
							->join('users', 'mahasiswa.user_id', '=', 'users.user_id')
							->where('users.user_id', $userid)
							->get('mahasiswa.nim')->first();
		// dd($nim);

		return view('laporan.create', compact('nim'));
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
			'nama_kegiatan' => 'required',
			'tanggal_kegiatan' => 'required',
			'deskripsi_kegiatan' => 'required',
			'foto_kegiatan' => 'required|image|max:2048',
		]);

		$path_storage = 'laporan/' . $request->get('nim');

		if ($request->file('foto_kegiatan')->getClientOriginalName()) {
			$name_foto = $request->file('foto_kegiatan')->getClientOriginalName();
			$path_foto = $request->file('foto_kegiatan')->store($path_storage);
		}

		$newLogBook = new Laporan([
			'nama_kegiatan' => $request->get('nama_kegiatan'),
			'tanggal_kegiatan' => $request->get('tanggal_kegiatan'),
			'deskripsi_kegiatan' => $request->get('deskripsi_kegiatan'),
			'foto_kegiatan' => $path_foto,
			'nim' => $request->get('nim'),
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		]);
		$newLogBook->save();

		return redirect('/laporan')->with('success', 'Tambah Laporan berhasil!');
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
		$laporan = Laporan::find($laporan);
		
		return view('laporan.edit', compact('laporan'));
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
			'kode_laporan' => 'required',
			'nama_laporan' => 'required',
		]);

		$laporan = Laporan::find($laporan);
		$laporan->kode_laporan =  $request->get('kode_laporan');
		$laporan->nama_laporan = $request->get('nama_laporan');
		$laporan->dekan = $request->get('dekan');
		$laporan->wadek = $request->get('wadek');
		$laporan->updated_at = date('Y-m-d H:i:s');
		$laporan->save();

		return redirect('/laporan')->with('success', 'Laporan berhasil diubah!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		// dd($laporan);exit();
		$laporan = Laporan::find($id);
		$laporan->delete();
		
		return redirect('/laporan')->with('success', 'Laporan berhasil dihapus!');
	}
}
