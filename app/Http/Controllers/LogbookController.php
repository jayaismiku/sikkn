<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Mahasiswa;
use App\Logbook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class LogbookController extends Controller
{
	private $nim;

	public function __construct(Request $request)
	{
		
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		// dd($request->attributes->get('nim')->nim);
		$this->nim = $request->attributes->get('nim')->nim;
		$logbook = Logbook::where('nim', $this->nim)->get();
		// dd($logbook);
		return view('logbook.index', compact('logbook'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$userid = Auth::user()->user_id;
		$nim = Logbook::join('mahasiswa', 'logbook.nim', '=', 'mahasiswa.nim')
							->join('users', 'mahasiswa.user_id', '=', 'users.user_id')
							->where('users.user_id', $userid)
							->get('mahasiswa.nim')->first();
		// dd($userid);

		return view('logbook.create', compact('nim'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		// dd($request->get('nim')->nim);
		$request->validate([
			'nama_kegiatan' => 'required',
			'tanggal_kegiatan' => 'required',
			'deskripsi_kegiatan' => 'required',
			'foto_kegiatan' => 'required|image',
		]);

		// if ($request->file('foto_kegiatan')) {
		// 	$file = $request->file('foto_kegiatan');
		// 	$fileName = strtolower(preg_replace('/\s+/', '', $file->getClientOriginalName()));
		// 	$filePath = 'logbook/' . $request->get('nim')->nim . '/' . $fileName;
		// 	Storage::disk('public')->put($filePath, file_get_contents($file));
		// }

		$path_storage = 'logbook/' . $request->get('nim')->nim . '/';

		// if ($request->file('foto_kegiatan')->getClientOriginalName()) {
		// 	$name_foto = $request->file('foto_kegiatan')->getClientOriginalName();
		// 	$path_foto = $request->file('foto_kegiatan')->store($path_storage);
		// }
		$image = $request->file('foto_kegiatan');
        $imageName = date('YmdHis').'.'.$image->getClientOriginalExtension();
        $filePath = $path_storage . $imageName;
        // dd($imageName);
        if ($image->getSize() > 2 * 1024 * 1024) {
            $imageCompressed = Image::make($image)->orientate()
                ->resize(1024, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->encode('jpg', 80); // Kompresi gambar
            Storage::disk('public')->put($filePath, (string) $imageCompressed);
            // Storage::put($path_storage . $imageName, (string) $imageCompressed);
        } else {
            // Simpan gambar langsung tanpa kompresi
            // $image->storeAs($path_storage, $imageName);
            Storage::disk('public')->put($filePath, file_get_contents($image));
        }

		$newLogBook = new Logbook([
			'nama_kegiatan' => $request->get('nama_kegiatan'),
			'slug_kegiatan' => $request->get('slug_kegiatan'),
			'tanggal_kegiatan' => $request->get('tanggal_kegiatan'),
			'deskripsi_kegiatan' => $request->get('deskripsi_kegiatan'),
			'foto_kegiatan' => $path_storage . $imageName,
			'nim' => $request->get('nim')->nim,
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		]);
		$newLogBook->save();

		return redirect('/logbook')->with('success', 'Tambah Logbook berhasil!');
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
		$logbook = Logbook::find($id);
		
		return view('logbook.edit', compact('logbook'));
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
			'kode_logbook' => 'required',
			'nama_logbook' => 'required',
		]);

		$logbook = Logbook::find($logbook);
		$logbook->kode_logbook =  $request->get('kode_logbook');
		$logbook->nama_logbook = $request->get('nama_logbook');
		$logbook->dekan = $request->get('dekan');
		$logbook->wadek = $request->get('wadek');
		$logbook->updated_at = date('Y-m-d H:i:s');
		$logbook->save();

		return redirect('/logbook')->with('success', 'Logbook berhasil diubah!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		// dd($logbook);exit();
		$logbook = Logbook::find($id);
		$logbook->delete();
		
		return redirect('/logbook')->with('success', 'Logbook berhasil dihapus!');
	}
}
