<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Provinsi;
use App\Kota;
use App\Kecamatan;
use App\Kelurahan;

class WilayahController extends Controller
{
	public function getProvinsi()
	{
		$provinsi = Provinsi::all()->where('status', '1');

		return response()->json($provinsi, 200);
	}

	public function getKota(Request $request, $provinsi = 12)
	{
		// dd($provinsi);
		$kota = Kota::all()->where('provinsi_id', $provinsi);
				
		return response()->json($kota, 200);
	}
	
	public function getKecamatan(Request $request, $kota = 161)
	{
		$kecamatan = Kecamatan::all()->where('kota_id', $kota);

		return response()->json($kecamatan, 200);
	}
	
	public function getKelurahan(Request $request, $kecamatan = 2458)
	{
		$kelurahan = Kelurahan::all()->where('kecamatan_id', $kecamatan);

		return response()->json($kelurahan, 200);
	}
}
