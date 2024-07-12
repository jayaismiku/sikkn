<?php

namespace App\Http\Controllers;

use App\Desa;
use App\Provinsi;
use App\Kota;
use App\Kecamatan;
use App\Kelurahan;
use App\Perangkat;
use Illuminate\Http\Request;

class PerangkatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perangkat = Perangkat::join('desa', 'perangkatdesa.desa_id', '=', 'desa.desa_id')->get();
		// dd($perangkat);
		return view('perangkat.index', compact('perangkat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $desa = Desa::get(['desa_id', 'nama_desa']);
        // dd($desa);
        return view('perangkat.create', compact('desa'));
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
			'nama_lengkap' => 'required',
			'jabatan' => 'required',
			'telp' => 'required',
            'desa' => 'required'
		]);

		$newPerangkat = new Perangkat([
			'nama_lengkap' => $request->get('nama_lengkap'),
			'jabatan' => $request->get('jabatan'),
			'telp' => $request->get('telp'),
			'desa_id' => $request->get('desa'),
		]);
		$newPerangkat->save();

		return redirect('/perangkat')->with('success', 'Tambah Perangkat Desa berhasil!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $desa = Desa::get(['desa_id', 'nama_desa']);
		$perangkat = Perangkat::find($id);
        // dd($perangkat);
        return view('perangkat.edit', compact(['desa', 'perangkat']));
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
			'nama_lengkap' => 'required',
			'jabatan' => 'required',
			'telp' => 'required',
            'desa' => 'required'
		]);

		$perangkat = Perangkat::find($id);
		$perangkat->nama_lengkap =  $request->get('nama_lengkap');
		$perangkat->jabatan = $request->get('jabatan');
		$perangkat->telp = $request->get('telp');
		$perangkat->desa_id = $request->get('desa');
		$perangkat->updated_at = date('Y-m-d H:i:s');
		$perangkat->save();

		return redirect('/perangkat')->with('success', 'Perangkat Desa berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
