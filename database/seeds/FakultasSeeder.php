<?php

use Illuminate\Database\Seeder;

class FakultasSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$table = 'fakultas';

		$data = array(
			[
				'fakultas_id' => 1,
				'kode_fakultas' => 'FST',
				'nama_fakultas' => 'Fakultas Sains dan Teknologi',
				'dekan' => 'Prof. Mad. Dr. Ir. Syafrudin Masri, M.Eng. IPM.',
				'wadek' => 'Jaya Kuncara Rosa Susila, M.T.'
			],
			[
				'fakultas_id' => 2,
				'kode_fakultas' => 'FSH',
				'nama_fakultas' => 'Fakultas Sosial dan Humaniora',
				'dekan' => '',
				'wadek' => ''
			],
			[
				'fakultas_id' => 3,
				'kode_fakultas' => 'FEB',
				'nama_fakultas' => 'Fakultas Ekonomi dan Bisnis',
				'dekan' => '',
				'wadek' => ''
			],
			[
				'fakultas_id' => 4,
				'kode_fakultas' => 'FAI',
				'nama_fakultas' => 'Fakultas Agama Islam',
				'dekan' => '',
				'wadek' => ''
			],
		);

		foreach($data as $i){
			DB::table($table)->insert([
				$i
			]);	
		}
	}
}
