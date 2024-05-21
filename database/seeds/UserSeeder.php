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
		$table = 'users';
		$faker = Faker::create('id_ID');
		
		$data = array(
			[
				'username' => 'admin-'.Str::random(5),
				'email' => 'admin@mail.com',
				'email_verified_at' => now(),
				'password' => Hash::make('admin'),
				'role' => 'admin',
				'status' => true,
			],
			[
				'username' => 'panitia-'.Str::random(5),
				'email' => 'panitia1@mail.com',
				'password' => Hash::make('panitia'),
				'role' => 'panitia',
				'status' => true,
			],
			[
				'username' => 'panitia-'.Str::random(5),
				'email' => 'panitia2@mail.com',
				'password' => Hash::make('panitia'),
				'role' => 'panitia',
				'status' => true,
			],
			[
				'username' => 'panitia-'.Str::random(5),
				'email' => 'panitia3@mail.com',
				'password' => Hash::make('panitia'),
				'role' => 'panitia',
				'status' => true,
			],
			[
				'username' => 'panitia-'.Str::random(5),
				'email' => 'panitia4@mail.com',
				'password' => Hash::make('panitia'),
				'role' => 'panitia',
				'status' => true,
			],
			[
				'username' => 'panitia-'.Str::random(5),
				'email' => 'panitia5@mail.com',
				'password' => Hash::make('panitia'),
				'role' => 'panitia',
				'status' => true,
			],
			[
				'username' => 'pemonev-'.Str::random(5),
				'email' => 'pemonev1@mail.com',
				'password' => Hash::make('pemonev'),
				'role' => 'panitia',
				'status' => true,
			],
			[
				'username' => 'pemonev-'.Str::random(5),
				'email' => 'pemonev2@mail.com',
				'password' => Hash::make('pemonev'),
				'role' => 'panitia',
				'status' => true,
			],
			[
				'username' => 'pemonev-'.Str::random(5),
				'email' => 'pemonev3@mail.com',
				'password' => Hash::make('pemonev'),
				'role' => 'panitia',
				'status' => true,
			],
			[
				'username' => 'pemonev-'.Str::random(5),
				'email' => 'pemonev4@mail.com',
				'password' => Hash::make('pemonev'),
				'role' => 'panitia',
				'status' => true,
			],
			[
				'username' => 'pemonev-'.Str::random(5),
				'email' => 'pemonev5@mail.com',
				'password' => Hash::make('pemonev'),
				'role' => 'panitia',
				'status' => true,
			],
			[
				'username' => 'dpl-'.Str::random(5),
				'email' => 'dpl1@mail.com',
				'password' => Hash::make('dpl'),
				'role' => 'dpl',
				'status' => true,
			],
			[
				'username' => 'dpl-'.Str::random(5),
				'email' => 'dpl2@mail.com',
				'password' => Hash::make('dpl'),
				'role' => 'dpl',
				'status' => true,
			],
			[
				'username' => 'dpl-'.Str::random(5),
				'email' => 'dpl3@mail.com',
				'password' => Hash::make('dpl'),
				'role' => 'dpl',
				'status' => true,
			],
			[
				'username' => 'dpl-'.Str::random(5),
				'email' => 'dpl4@mail.com',
				'password' => Hash::make('dpl'),
				'role' => 'dpl',
				'status' => true,
			],
			[
				'username' => 'dpl-'.Str::random(5),
				'email' => 'dpl5@mail.com',
				'password' => Hash::make('dpl'),
				'role' => 'dpl',
				'status' => true,
			],
			[
				'username' => 'dpl-'.Str::random(5),
				'email' => 'dpl6@mail.com',
				'password' => Hash::make('dpl'),
				'role' => 'dpl',
				'status' => true,
			],
			[
				'username' => 'dpl-'.Str::random(5),
				'email' => 'dpl7@mail.com',
				'password' => Hash::make('dpl'),
				'role' => 'dpl',
				'status' => true,
			],
			[
				'username' => 'dpl-'.Str::random(5),
				'email' => 'dpl8@mail.com',
				'password' => Hash::make('dpl'),
				'role' => 'dpl',
				'status' => true,
			],
			[
				'username' => 'dpl-'.Str::random(5),
				'email' => 'dpl9@mail.com',
				'password' => Hash::make('dpl'),
				'role' => 'dpl',
				'status' => true,
			],
			[
				'username' => 'dpl-'.Str::random(5),
				'email' => 'dpl10@mail.com',
				'password' => Hash::make('dpl'),
				'role' => 'dpl',
				'status' => true,
			],
			[
				'username' => 'mahasiswa-'.Str::random(5),
				'email' => 'mahasiswa1@mail.com',
				'password' => Hash::make('mahasiswa'),
				'role' => 'mahasiswa',
				'status' => true,
			],
			[
				'username' => 'mahasiswa-'.Str::random(5),
				'email' => 'mahasiswa2@mail.com',
				'password' => Hash::make('mahasiswa'),
				'role' => 'mahasiswa',
				'status' => true,
			],
			[
				'username' => 'mahasiswa-'.Str::random(5),
				'email' => 'mahasiswa3@mail.com',
				'password' => Hash::make('mahasiswa'),
				'role' => 'mahasiswa',
				'status' => true,
			],
			[
				'username' => 'mahasiswa-'.Str::random(5),
				'email' => 'mahasiswa4@mail.com',
				'password' => Hash::make('mahasiswa'),
				'role' => 'mahasiswa',
				'status' => true,
			],
			[
				'username' => 'mahasiswa-'.Str::random(5),
				'email' => 'mahasiswa5@mail.com',
				'password' => Hash::make('mahasiswa'),
				'role' => 'mahasiswa',
				'status' => true,
			],
			[
				'username' => 'mahasiswa-'.Str::random(5),
				'email' => 'mahasiswa6@mail.com',
				'password' => Hash::make('mahasiswa'),
				'role' => 'mahasiswa',
				'status' => true,
			],
			[
				'username' => 'mahasiswa-'.Str::random(5),
				'email' => 'mahasiswa7@mail.com',
				'password' => Hash::make('mahasiswa'),
				'role' => 'mahasiswa',
				'status' => true,
			],
			[
				'username' => 'mahasiswa-'.Str::random(5),
				'email' => 'mahasiswa8@mail.com',
				'password' => Hash::make('mahasiswa'),
				'role' => 'mahasiswa',
				'status' => true,
			],
			[
				'username' => 'mahasiswa-'.Str::random(5),
				'email' => 'mahasiswa9@mail.com',
				'password' => Hash::make('mahasiswa'),
				'role' => 'mahasiswa',
				'status' => true,
			],
			[
				'username' => 'mahasiswa-'.Str::random(5),
				'email' => 'mahasiswa10@mail.com',
				'password' => Hash::make('mahasiswa'),
				'role' => 'mahasiswa',
				'status' => true,
			],
			[
				'username' => 'mahasiswa-'.Str::random(5),
				'email' => 'mahasiswa11@mail.com',
				'password' => Hash::make('mahasiswa'),
				'role' => 'mahasiswa',
				'status' => true,
			],
			[
				'username' => 'mahasiswa-'.Str::random(5),
				'email' => 'mahasiswa12@mail.com',
				'password' => Hash::make('mahasiswa'),
				'role' => 'mahasiswa',
				'status' => true,
			],
			[
				'username' => 'mahasiswa-'.Str::random(5),
				'email' => 'mahasiswa13@mail.com',
				'password' => Hash::make('mahasiswa'),
				'role' => 'mahasiswa',
				'status' => true,
			],
			[
				'username' => 'mahasiswa-'.Str::random(5),
				'email' => 'mahasiswa14@mail.com',
				'password' => Hash::make('mahasiswa'),
				'role' => 'mahasiswa',
				'status' => true,
			],
			[
				'username' => 'mahasiswa-'.Str::random(5),
				'email' => 'mahasiswa15@mail.com',
				'password' => Hash::make('mahasiswa'),
				'role' => 'mahasiswa',
				'status' => true,
			],
			[
				'username' => 'mahasiswa-'.Str::random(5),
				'email' => 'mahasiswa16@mail.com',
				'password' => Hash::make('mahasiswa'),
				'role' => 'mahasiswa',
				'status' => true,
			],
			[
				'username' => 'mahasiswa-'.Str::random(5),
				'email' => 'mahasiswa17@mail.com',
				'password' => Hash::make('mahasiswa'),
				'role' => 'mahasiswa',
				'status' => true,
			],
			[
				'username' => 'mahasiswa-'.Str::random(5),
				'email' => 'mahasiswa18@mail.com',
				'password' => Hash::make('mahasiswa'),
				'role' => 'mahasiswa',
				'status' => true,
			],
			[
				'username' => 'mahasiswa-'.Str::random(5),
				'email' => 'mahasiswa19@mail.com',
				'password' => Hash::make('mahasiswa'),
				'role' => 'mahasiswa',
				'status' => true,
			],
			[
				'username' => 'mahasiswa-'.Str::random(5),
				'email' => 'mahasiswa20@mail.com',
				'password' => Hash::make('mahasiswa'),
				'role' => 'mahasiswa',
				'status' => true,
			],
			[
				'username' => 'mahasiswa-'.Str::random(5),
				'email' => 'mahasiswa21@mail.com',
				'password' => Hash::make('mahasiswa'),
				'role' => 'mahasiswa',
				'status' => true,
			],
			[
				'username' => 'mahasiswa-'.Str::random(5),
				'email' => 'mahasiswa22@mail.com',
				'password' => Hash::make('mahasiswa'),
				'role' => 'mahasiswa',
				'status' => true,
			],
			[
				'username' => 'mahasiswa-'.Str::random(5),
				'email' => 'mahasiswa23@mail.com',
				'password' => Hash::make('mahasiswa'),
				'role' => 'mahasiswa',
				'status' => true,
			],
			[
				'username' => 'mahasiswa-'.Str::random(5),
				'email' => 'mahasiswa24@mail.com',
				'password' => Hash::make('mahasiswa'),
				'role' => 'mahasiswa',
				'status' => true,
			],
			[
				'username' => 'mahasiswa-'.Str::random(5),
				'email' => 'mahasiswa25@mail.com',
				'password' => Hash::make('mahasiswa'),
				'role' => 'mahasiswa',
				'status' => true,
			],
			[
				'username' => 'mahasiswa-'.Str::random(5),
				'email' => 'mahasiswa26@mail.com',
				'password' => Hash::make('mahasiswa'),
				'role' => 'mahasiswa',
				'status' => true,
			],
			[
				'username' => 'mahasiswa-'.Str::random(5),
				'email' => 'mahasiswa27@mail.com',
				'password' => Hash::make('mahasiswa'),
				'role' => 'mahasiswa',
				'status' => true,
			],
			[
				'username' => 'mahasiswa-'.Str::random(5),
				'email' => 'mahasiswa28@mail.com',
				'password' => Hash::make('mahasiswa'),
				'role' => 'mahasiswa',
				'status' => true,
			],
			[
				'username' => 'mahasiswa-'.Str::random(5),
				'email' => 'mahasiswa29@mail.com',
				'password' => Hash::make('mahasiswa'),
				'role' => 'mahasiswa',
				'status' => true,
			],
			[
				'username' => 'mahasiswa-'.Str::random(5),
				'email' => 'mahasiswa30@mail.com',
				'password' => Hash::make('mahasiswa'),
				'role' => 'mahasiswa',
				'status' => true,
			],
		);

		foreach($data as $i){
			DB::table($table)->insert([
				$i
			]);	
		}
	}
}
