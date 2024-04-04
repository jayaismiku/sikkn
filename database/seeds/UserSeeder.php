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
				'userid' => 'admin-'.Str::random(5),
				'username' => 'admin',
				'email' => 'admin@mail.com',
				'password' => Hash::make('admin'),
				'phone' => $faker->e164PhoneNumber,
				'role' => 'admin',
				'status' => true,
			],
			[
				'userid' => 'lppm-'.Str::random(5),
				'username' => 'lppm',
				'email' => 'lppm@mail.com',
				'password' => Hash::make('lembaga'),
				'phone' => $faker->e164PhoneNumber,
				'role' => 'lembaga',
				'status' => true,
			],
			[
				'userid' => 'panitia-'.Str::random(5),
				'username' => 'panitia',
				'email' => 'panitia@mail.com',
				'password' => Hash::make('panitia'),
				'phone' => $faker->e164PhoneNumber,
				'role' => 'panitia',
				'status' => true,
			],
			[
				'userid' => 'pendamping-'.Str::random(5),
				'username' => 'pendamping',
				'email' => 'pendamping@mail.com',
				'password' => Hash::make('pendamping'),
				'phone' => $faker->e164PhoneNumber,
				'role' => 'pendamping',
				'status' => true,
			],
			[
				'userid' => 'mahasiswa-'.Str::random(5),
				'username' => 'mahasiswa',
				'email' => 'mahasiswa@mail.com',
				'password' => Hash::make('mahasiswa'),
				'phone' => $faker->e164PhoneNumber,
				'role' => 'mahasiswa',
				'status' => true,
			],
			[
				'userid' => 'desa-'.Str::random(5),
				'username' => 'desa',
				'email' => 'desa@mail.com',
				'password' => Hash::make('desa'),
				'phone' => $faker->e164PhoneNumber,
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
