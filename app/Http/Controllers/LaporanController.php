<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Mahasiswa;
use App\Laporan;
use App\Pendamping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class LaporanController extends Controller
{
	protected $nim;
	protected $kelompok;

	public function __construct()
	{
		// $this->nim = Mahasiswa::join('users', 'mahasiswa.user_id', '=', 'users.user_id')
		// 					->where('users.user_id', Auth::user()->user_id)
		// 					->get('nim')->first();
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		$this->nim = $request->attributes->get('nim');
		// dd($this->nim);
		$this->kelompok = Mahasiswa::join('pengelompokan', 'mahasiswa.nim', '=', 'pengelompokan.nim')
							->where('mahasiswa.nim', $this->nim)
							->pluck('pengelompokan.kelompok_id')->first();
		// dd($this->kelompok);
		$laporan = Laporan::where('kelompok_id', $this->kelompok)->get();
		// dd($laporan);

		return view('laporan.index', compact('laporan'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create(Request $request)
	{
		$nim = $request->attributes->get('nim');
		$kelompok = Mahasiswa::join('pengelompokan', 'mahasiswa.nim', '=', 'pengelompokan.nim')
							->where('mahasiswa.nim', $nim)
							->get(['pengelompokan.kelompok_id','pengelompokan.nama_kelompok'])->first();
		// dd($kelompok);

		return view('laporan.create', compact('kelompok'));
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
			'judul_laporan' => 'required',
			'tipe_laporan' => 'required',
			'unggah_laporan' => 'required|mimes:pdf|max:10000',
		]);

		$path_storage = 'laporan/' . $request->get('nama_kelompok'). '/';
		$filelap = $request->file('unggah_laporan');
		$fileName = date('YmdHis').'.'.$filelap->getClientOriginalExtension();
		$filePath = $path_storage . $fileName;
		Storage::disk('public')->put($filePath, file_get_contents($filelap));

		$simpanLaporan = new Laporan([
			'judul_laporan' => $request->get('judul_laporan'),
			'tipe_laporan' => $request->get('tipe_laporan'),
			'unggah_file' => $filePath,
			'tanggal_unggah' => $request->get('tanggal_unggah'),
			'kelompok_id' => $request->get('kelompok_id'),
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		]);
		$simpanLaporan->save();

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
		$laporan = Laporan::join('kelompok', 'laporan.kelompok_id', '=', 'kelompok.kelompok_id')
					->find($id);
		// dd($laporan);
		
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
		// dd($request);
		$request->validate([
			'judul_laporan' => 'required',
			'tipe_laporan' => 'required',
			'unggah_laporan' => 'required|mimes:pdf|max:10000',
		]);

		$path_storage = 'laporan/' . $request->get('nama_kelompok'). '/';
		$filelap = $request->file('unggah_laporan');
		  $fileName = date('YmdHis').'.'.$filelap->getClientOriginalExtension();
		  $filePath = $path_storage . $fileName;
		  Storage::disk('public')->put($filePath, file_get_contents($filelap));

		$ubahLaporan = Laporan::find($id);
		$ubahLaporan->judul_laporan =  $request->get('judul_laporan');
		$ubahLaporan->tipe_laporan = $request->get('tipe_laporan');
		$ubahLaporan->unggah_file = $filePath;
		$ubahLaporan->updated_at = date('Y-m-d H:i:s');
		$ubahLaporan->save();

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

	/**
	 * Validate the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function validasi()
	{
		$this->authorize('validasi', Logbook::class);
		
		$userid = Auth::id();
		$dpl = Pendamping::join('dosen', 'pendamping.dosen_id', '=', 'dosen.dosen_id')
					->leftjoin('users', 'dosen.user_id', '=', 'users.user_id')
					->where('users.user_id', $userid)->pluck('pendamping.pendamping_id')->first();
		$laporan = Laporan::join('kelompok', 'laporan.kelompok_id', '=', 'kelompok.kelompok_id')
						->where('kelompok.pendamping_id', $dpl)->get();
		// dd($laporan);

		return view('laporan.validasi', compact('dpl', 'laporan'));
	}

	public function tervalidasi($id)
	{
		// dd($laporan);exit();
		$laporan = Laporan::find($id);
		$laporan->validasi =  true;
		$laporan->save();
		
		return redirect('/laporan/validasi')->with('success', 'Laporan berhasil divalidasi!');
	}
}
