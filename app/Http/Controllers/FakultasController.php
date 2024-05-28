<?php

namespace App\Http\Controllers;

use App\Fakultas;
use Illuminate\Http\Request;

class FakultasController extends Controller
{
	public function __construct()
	{
		// $this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$fakultas = Fakultas::all();

		return view('fakultas.index', compact('fakultas'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('fakultas.create');
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
			'kode_fakultas' => 'required',
			'nama_fakultas' => 'required',
		]);

		$newFakultas = new Fakultas([
			'kode_fakultas' => $request->get('kode_fakultas'),
			'nama_fakultas' => $request->get('nama_fakultas'),
			'dekan' => $request->get('dekan'),
			'wadek' => $request->get('wadek'),
			// 'created_at' => date('Y-m-d H:i:s'),
			// 'updated_at' => date('Y-m-d H:i:s')
		]);
		$newFakultas->save();

		return redirect('/fakultas')->with('success', 'Tambah Fakultas berhasil!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Fakultas  $fakultas
	 * @return \Illuminate\Http\Response
	 */
	public function show(Fakultas $fakultas)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Fakultas  $fakultas
	 * @return \Illuminate\Http\Response
	 */
	public function edit($fakultas)
	{
		$fakultas = Fakultas::find($fakultas);
		
		return view('fakultas.edit', compact('fakultas'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Fakultas  $fakultas
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $fakultas)
	{
		$request->validate([
			'kode_fakultas' => 'required',
			'nama_fakultas' => 'required',
		]);

		$fakultas = Fakultas::find($fakultas);
		$fakultas->kode_fakultas =  $request->get('kode_fakultas');
		$fakultas->nama_fakultas = $request->get('nama_fakultas');
		$fakultas->dekan = $request->get('dekan');
		$fakultas->wadek = $request->get('wadek');
		$fakultas->updated_at = date('Y-m-d H:i:s');
		$fakultas->save();

		return redirect('/fakultas')->with('success', 'Fakultas berhasil diubah!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Fakultas  $fakultas
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($fakultas)
	{
		// dd($fakultas);exit();
		$fakultas = Fakultas::find($fakultas);
		$fakultas->delete();
		
		return redirect('/fakultas')->with('success', 'Fakultas berhasil dihapus!');
	}
}
