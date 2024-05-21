<?php

use Illuminate\Database\Seeder;

class ProdiSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$table = 'prodi';
		
		$data = array(
			[
				'prodi_id' => 1,
				'kode_prodi' => 'TE',
				'nama_prodi' => 'Teknik Elektro',
				'kaprodi' => '',
				'sekprodi' => '',
				'fakultas' => 'FST',
			],
			[
				'prodi_id' => 2,
				'kode_prodi' => 'IF',
				'nama_prodi' => 'Teknik Informatika',
				'kaprodi' => '',
				'sekprodi' => '',
				'fakultas' => 'FST',
			],
			[
				'prodi_id' => 3,
				'kode_prodi' => 'TI',
				'nama_prodi' => 'Teknik Industri',
				'kaprodi' => '',
				'sekprodi' => '',
				'fakultas' => 'FST',
			],
			[
				'prodi_id' => 4,
				'kode_prodi' => 'TP',
				'nama_prodi' => 'Teknologi Pangan',
				'kaprodi' => '',
				'sekprodi' => '',
				'fakultas' => 'FST',
			],
			[
				'prodi_id' => 5,
				'kode_prodi' => 'FA',
				'nama_prodi' => 'Farmasi',
				'kaprodi' => '',
				'sekprodi' => '',
				'fakultas' => 'FST',
			],
			[
				'prodi_id' => 6,
				'kode_prodi' => 'BIO',
				'nama_prodi' => 'Bioteknologi',
				'kaprodi' => '',
				'sekprodi' => '',
				'fakultas' => 'FST',
			],
			[
				'prodi_id' => 7,
				'kode_prodi' => 'AGRI',
				'nama_prodi' => 'Agribisnis',
				'kaprodi' => '',
				'sekprodi' => '',
				'fakultas' => 'FST',
			],
			[
				'prodi_id' => 8,
				'kode_prodi' => 'ILKOM',
				'nama_prodi' => 'Ilmu Komunikasi',
				'kaprodi' => '',
				'sekprodi' => '',
				'fakultas' => 'FSH',
			],
			[
				'prodi_id' => 9,
				'kode_prodi' => 'PSI',
				'nama_prodi' => 'Psikologi',
				'kaprodi' => '',
				'sekprodi' => '',
				'fakultas' => 'FSH',
			],
			[
				'prodi_id' => 10,
				'kode_prodi' => 'KTF',
				'nama_prodi' => 'Kriya Tekstil dan Fashion',
				'kaprodi' => '',
				'sekprodi' => '',
				'fakultas' => 'FSH',
			],
			[
				'prodi_id' => 11,
				'kode_prodi' => 'AP',
				'nama_prodi' => 'Administrasi Publik',
				'kaprodi' => '',
				'sekprodi' => '',
				'fakultas' => 'FSH',
			],
			[
				'prodi_id' => 12,
				'kode_prodi' => 'AKUN',
				'nama_prodi' => 'Akuntansi',
				'kaprodi' => '',
				'sekprodi' => '',
				'fakultas' => 'FEB',
			],
			[
				'prodi_id' => 13,
				'kode_prodi' => 'MAN',
				'nama_prodi' => 'Managemen',
				'kaprodi' => '',
				'sekprodi' => '',
				'fakultas' => 'FEB',
			],
			[
				'prodi_id' => 14,
				'kode_prodi' => 'PAI',
				'nama_prodi' => 'Pendidikan Agama Islam',
				'kaprodi' => '',
				'sekprodi' => '',
				'fakultas' => 'FAI',
			],
			[
				'prodi_id' => 15,
				'kode_prodi' => 'PIAUD',
				'nama_prodi' => 'Pendidikan Islam Anak Usia Dini',
				'kaprodi' => '',
				'sekprodi' => '',
				'fakultas' => 'FAI',
			],
			[
				'prodi_id' => 16,
				'kode_prodi' => 'HKI',
				'nama_prodi' => 'Hukum Keluarga Islam',
				'kaprodi' => '',
				'sekprodi' => '',
				'fakultas' => 'FAI',
			],
			[
				'prodi_id' => 17,
				'kode_prodi' => 'KPI',
				'nama_prodi' => 'Komunikasi Penyiaran Islam',
				'kaprodi' => '',
				'sekprodi' => '',
				'fakultas' => 'FAI',
			],
			[
				'prodi_id' => 18,
				'kode_prodi' => 'EKSYAR',
				'nama_prodi' => 'Ekonomi Syariah',
				'kaprodi' => '',
				'sekprodi' => '',
				'fakultas' => 'FAI',
			],
		);

		foreach($data as $i){
			DB::table($table)->insert([
				$i
			]);	
		}
	}
}
