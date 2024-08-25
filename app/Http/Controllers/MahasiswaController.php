<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MahasiswaController extends Controller
{
	public function getMahasiswa()
	{
		$mahasiswa = Mahasiswa::all(['nim', 'nama_lengkap', 'jenis_kelamin', 'prodi']);
		// dd($mahasiswa);
		return response()->json($mahasiswa);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$mahasiswa = Mahasiswa::leftjoin('users', 'mahasiswa.user_id', '=', 'users.user_id')
						->orderBy('mahasiswa.jenis_kkn', 'asc')->get();

		return view('mahasiswa.index', compact('mahasiswa'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('mahasiswa.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
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
		$mahasiswa = Mahasiswa::find($id);
		// dd($mahasiswa);
		
		return view('mahasiswa.edit', compact('mahasiswa'));
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
			'nim' => 'required|unique:mahasiswa|max:15',
			'nama_mhs' => 'required',
			'jenis_kelamin' => 'required',
			'fakultas' => 'required',
			'prodi' => 'required',
			'semester' => 'required',
			'telp_mhs' => 'required|max:15',
			'nama_ortu' => 'required',
			'telp_ortu' => 'required|max:15',
		]);

		$rootUnggah = 'mahasiswa/' . Auth::id() . '/';
		if ($request->file('krs')) {
			$fileKRS = $request->file('krs');
			$fileNameKRS = date('YmdHis').'.'.$fileKRS->getClientOriginalExtension();
			$filePathKRS = $rootUnggah . $fileNameKRS;
			Storage::disk('public')->put($filePathKRS, file_get_contents($fileKRS));
		}else{
			$filePathKRS = null;
		}

		if ($request->file('ukt')) {
			$fileUKT = $request->file('ukt');
			$fileNameUKT = date('YmdHis').'.'.$fileUKT->getClientOriginalExtension();
			$filePathUKT = $rootUnggah . $fileNameUKT;
			Storage::disk('public')->put($filePathUKT, file_get_contents($fileUKT));
		}else{
			$filePathUKT = null;
		}

		if ($request->file('bayar')) {
			$fileBiaya = $request->file('bayar');
			$fileNameBiaya = date('YmdHis').'.'.$fileBiaya->getClientOriginalExtension();
			$filePathBiaya = $rootUnggah . $fileNameBiaya;
			Storage::disk('public')->put($filePathBiaya, file_get_contents($fileBiaya));
		}else{
			$filePathBiaya = null;
		}

		if ($request->file('suratkesediaan')) {
			$fileKesediaan = $request->file('suratkesediaan');
			$fileNameKesediaan = date('YmdHis').'.'.$fileKesediaan->getClientOriginalExtension();
			$filePathKesediaan = $rootUnggah . $fileNameKesediaan;
			Storage::disk('public')->put($filePathKesediaan, file_get_contents($fileKesediaan));
		}else{
			$filePathKesediaan = null;
		}

		if ($request->file('suratijinortu')) {
			$fileIjinOrtu = $request->file('suratijinortu');
			$fileNameIjinOrtu = date('YmdHis').'.'.$fileIjinOrtu->getClientOriginalExtension();
			$filePathIjinOrtu = $rootUnggah . $fileNameIjinOrtu;
			Storage::disk('public')->put($filePathIjinOrtu, file_get_contents($fileIjinOrtu));
		}else{
			$filePathIjinOrtu = null;
		}

		if ($request->file('sakit')) {
			$fileSuratSakit = $request->file('sakit');
			$fileNameSuratSakit = date('YmdHis').'.'.$fileSuratSakit->getClientOriginalExtension();
			$filePathSuratSakit = $rootUnggah . $fileNameSuratSakit;
			Storage::disk('public')->put($filePathSuratSakit, file_get_contents($fileSuratSakit));
		}else{
			$filePathSuratSakit = null;
		}

		$mahasiswa = Mahasiswa::find($id);
		$mahasiswa->nim =  $request->get('nim');
		$mahasiswa->nama_mhs = $request->get('nama_mhs');
		$mahasiswa->jenis_kelamin = $request->get('jenis_kelamin');
		$mahasiswa->alamat = $request->get('alamat');
		$mahasiswa->telp_mhs = $request->get('telp_mhs');
		$mahasiswa->fakultas = $request->get('fakultas');
		$mahasiswa->prodi = $request->get('prodi');
		$mahasiswa->semester = $request->get('semester');
		$mahasiswa->nama_ortu = $request->get('nama_ortu');
		$mahasiswa->telp_ortu = $request->get('telp_ortu');
		$mahasiswa->alergi = $request->get('alergi');
		$mahasiswa->unggah_krs = $filePathKRS;
		$mahasiswa->unggah_biaya = $filePathBiaya;
		$mahasiswa->unggah_ukt = $filePathUKT;
		$mahasiswa->unggah_surat_kesediaan = $filePathKesediaan;
		$mahasiswa->unggah_surat_ijin_ortu = $filePathIjinOrtu;
		$mahasiswa->sakit_berat = $filePathSuratSakit;
		$mahasiswa->save();

		if (Auth::user()->role == 'mahasiswa') {
			return redirect('/profil/mahasiswa')->with('success', 'User berhasil diubah!');
		} else {
			return redirect('/mahasiswa')->with('success', 'User berhasil diubah!');
		}
		

		return redirect('/mahasiswa')->with('success', 'User berhasil diubah!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$mahasiswa = Mahasiswa::find($id);
		$mahasiswa->delete();
		
		return redirect('/mahasiswa')->with('success', 'User berhasil dihapus!');
	}

	public function verify($id)
	{
		$mahasiswa = Mahasiswa::find($id);
		
		return view('mahasiswa.verify', compact('mahasiswa'));
	}

	public function verified($id)
	{
		// dd($id);
		$verify = User::find($id);
		$verify->status = 1;
		$verify->email_verified_at = date('Y-m-d H:i:s');
		$verify->save();

		return redirect('/mahasiswa')->with('success', 'Verifikasi User berhasil!');
	}
}
