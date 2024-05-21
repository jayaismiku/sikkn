<?php

use Illuminate\Database\Seeder;

class ProvinsiSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$table = 'provinsi';
		
		$data = array(
			[
				'provinsi_id' => 1,
				'nama_provinsi' => 'ACEH',
				'status' => 1,
			],
			[
				'provinsi_id' => 2,
				'nama_provinsi' => 'SUMATERA UTARA',
				'status' => 1,
			],
			[
				'provinsi_id' => 3,
				'nama_provinsi' => 'SUMATERA BARAT',
				'status' => 1,
			],
			[
				'provinsi_id' => 4,
				'nama_provinsi' => 'RIAU',
				'status' => 1,
			],
			[
				'provinsi_id' => 5,
				'nama_provinsi' => 'JAMBI',
				'status' => 1,
			],
			[
				'provinsi_id' => 6,
				'nama_provinsi' => 'SUMATERA SELATAN',
				'status' => 1,
			],
			[
				'provinsi_id' => 7,
				'nama_provinsi' => 'BENGKULU',
				'status' => 1,
			],
			[
				'provinsi_id' => 8,
				'nama_provinsi' => 'LAMPUNG',
				'status' => 1,
			],
			[
				'provinsi_id' => 9,
				'nama_provinsi' => 'KEPULAUAN BANGKA BELITUNG',
				'status' => 1,
			],
			[
				'provinsi_id' => 10,
				'nama_provinsi' => 'KEPULAUAN RIAU',
				'status' => 1,
			],
			[
				'provinsi_id' => 11,
				'nama_provinsi' => 'DKI JAKARTA',
				'status' => 1,
			],
			[
				'provinsi_id' => 12,
				'nama_provinsi' => 'JAWA BARAT',
				'status' => 1,
			],
			[
				'provinsi_id' => 13,
				'nama_provinsi' => 'JAWA TENGAH',
				'status' => 1,
			],
			[
				'provinsi_id' => 14,
				'nama_provinsi' => 'DI YOGYAKARTA',
				'status' => 1,
			],
			[
				'provinsi_id' => 15,
				'nama_provinsi' => 'JAWA TIMUR',
				'status' => 1,
			],
			[
				'provinsi_id' => 16,
				'nama_provinsi' => 'BANTEN',
				'status' => 1,
			],
			[
				'provinsi_id' => 17,
				'nama_provinsi' => 'BALI',
				'status' => 1,
			],
			[
				'provinsi_id' => 18,
				'nama_provinsi' => 'NUSA TENGGARA BARAT',
				'status' => 1,
			],
			[
				'provinsi_id' => 19,
				'nama_provinsi' => 'NUSA TENGGARA TIMUR',
				'status' => 1,
			],
			[
				'provinsi_id' => 20,
				'nama_provinsi' => 'KALIMANTAN BARAT',
				'status' => 1,
			],
			[
				'provinsi_id' => 21,
				'nama_provinsi' => 'KALIMANTAN TENGAH',
				'status' => 1,
			],
			[
				'provinsi_id' => 22,
				'nama_provinsi' => 'KALIMANTAN SELATAN',
				'status' => 1,
			],
			[
				'provinsi_id' => 23,
				'nama_provinsi' => 'KALIMANTAN TIMUR',
				'status' => 1,
			],
			[
				'provinsi_id' => 24,
				'nama_provinsi' => 'KALIMANTAN UTARA',
				'status' => 1,
			],
			[
				'provinsi_id' => 25,
				'nama_provinsi' => 'SULAWESI UTARA',
				'status' => 1,
			],
			[
				'provinsi_id' => 26,
				'nama_provinsi' => 'SULAWESI TENGAH',
				'status' => 1,
			],
			[
				'provinsi_id' => 27,
				'nama_provinsi' => 'SULAWESI SELATAN',
				'status' => 1,
			],
			[
				'provinsi_id' => 28,
				'nama_provinsi' => 'SULAWESI TENGGARA',
				'status' => 1,
			],
			[
				'provinsi_id' => 29,
				'nama_provinsi' => 'GORONTALO',
				'status' => 1,
			],
			[
				'provinsi_id' => 30,
				'nama_provinsi' => 'SULAWESI BARAT',
				'status' => 1,
			],
			[
				'provinsi_id' => 31,
				'nama_provinsi' => 'MALUKU',
				'status' => 1,
			],
			[
				'provinsi_id' => 32,
				'nama_provinsi' => 'MALUKU UTARA',
				'status' => 1,
			],
			[
				'provinsi_id' => 33,
				'nama_provinsi' => 'PAPUA',
				'status' => 1,
			],
			[
				'provinsi_id' => 34,
				'nama_provinsi' => 'PAPUA BARAT',
				'status' => 1,
			],
		);

		foreach($data as $i){
			DB::table($table)->insert([
				$i
			]);	
		}
	}
}
