<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$faker = Faker::create('id_ID');
		$data = array(
			[
				'user_id' => 'admin-'.Str::random(5),
				'user_name' => 'admin',
				'email' => 'admin@mail.com',
				'email_verified_at' => now(),
				'password' => Hash::make('admin'),
				'role' => 'admin',
				'status' => true,
			],
			[
				'user_id' => 'lppm-'.Str::random(5),
				'user_name' => 'lppm',
				'email' => 'lppm@mail.com',
				'password' => Hash::make('lembaga'),
				'role' => 'lembaga',
				'status' => true,
			],
			[
				'user_id' => 'panitia-'.Str::random(5),
				'user_name' => 'panitia',
				'email' => 'panitia@mail.com',
				'password' => Hash::make('panitia'),
				'role' => 'panitia',
				'status' => true,
			],
			[
				'user_id' => 'pendamping-'.Str::random(5),
				'user_name' => 'pendamping',
				'email' => 'pendamping@mail.com',
				'password' => Hash::make('pendamping'),
				'role' => 'pendamping',
				'status' => true,
			],
			[
				'user_id' => 'mahasiswa-'.Str::random(5),
				'user_name' => 'mahasiswa',
				'email' => 'mahasiswa@mail.com',
				'password' => Hash::make('mahasiswa'),
				'role' => 'mahasiswa',
				'status' => true,
			],
			[
				'user_id' => 'desa-'.Str::random(5),
				'user_name' => 'desa',
				'email' => 'desa@mail.com',
				'password' => Hash::make('desa'),
				'role' => 'desa',
				'status' => true,
			],
		);

		foreach($data as $i){
			DB::table('users')->insert([
				$i
			]);	
		}
	}
}
