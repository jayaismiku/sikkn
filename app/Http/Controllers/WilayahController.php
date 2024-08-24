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
		$provinsi = Provinsi::where('status', '1')->get();
		// dd($provinsi);
		$output = '<option selected>Pilih Provinsi</option>';
		foreach ($provinsi as $prov) {
			 $output .= '<option value="'.$prov->provinsi_id.'">'.$prov->nama_provinsi.'</option>';
		}
		return $output;
		// return response()->json($provinsi, 200);
	}

	public function getKota($provinsi = 12)
	{
		// dd($provinsi);
		$kota = Kota::where('provinsi_id', $provinsi)->get();
				
		$output = '<option selected>Pilih Kota/Kabupaten</option>';
		foreach ($kota as $k) {
			$output .= '<option value="'.$k->kota_id.'">'.$k->nama_kota.'</option>';
		}

      return $output;
		// return response()->json($kota, 200);
	}
	
	public function getKecamatan($kota = 161)
	{
		$kecamatan = Kecamatan::where('kota_id', $kota)->get();

		$output = '<option selected>Pilih Kecamatan</option>';
		foreach ($kecamatan as $kec) {
			$output .= '<option value="'.$kec->kecamatan_id.'">'.$kec->nama_kecamatan.'</option>';
		}
		
		return $output;
		// return response()->json($kecamatan, 200);
	}
	
	public function getKelurahan($kecamatan = 2458)
	{
		$kelurahan = Kelurahan::where('kecamatan_id', $kecamatan)->get();

		$output = '<option selected>Pilih Kelurahan</option>';
		foreach ($kelurahan as $kel) {
			$output .= '<option value="'.$kel->kelurahan_id.'">'.$kel->nama_kelurahan.'</option>';
		}
		
		return $output;
		// return response()->json($kelurahan, 200);
	}
}
