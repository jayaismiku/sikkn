<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('users')->insert(
			[
				'userid' => 'admin-'.Str::random(5),
				'username' => 'admin',
				'email' => 'admin@mail.com',
				'password' => Hash::make('admin'),
				'phone' => Str::random(12),
				'role' => 'admin',
				'status' => true,
			],
			[
				'userid' => 'lppm-'.Str::random(5),
				'username' => 'lppm',
				'email' => 'lppm@mail.com',
				'password' => Hash::make('lembaga'),
				'phone' => Str::random(12),
				'role' => 'lembaga',
				'status' => true,
			],
			[
				'userid' => 'panitia-'.Str::random(5),
				'username' => 'panitia',
				'email' => 'panitia@mail.com',
				'password' => Hash::make('panitia'),
				'phone' => Str::random(12),
				'role' => 'panitia',
				'status' => true,
			],
			[
				'userid' => 'pendamping-'.Str::random(5),
				'username' => 'pendamping',
				'email' => 'pendamping@mail.com',
				'password' => Hash::make('pendamping'),
				'phone' => Str::random(12),
				'role' => 'pendamping',
				'status' => true,
			],
			[
				'userid' => 'mahasiswa-'.Str::random(5),
				'username' => 'mahasiswa',
				'email' => 'mahasiswa@mail.com',
				'password' => Hash::make('mahasiswa'),
				'phone' => Str::random(12),
				'role' => 'mahasiswa',
				'status' => true,
			],
			[
				'userid' => 'desa-'.Str::random(5),
				'username' => 'desa',
				'email' => 'desa@mail.com',
				'password' => Hash::make('desa'),
				'phone' => Str::random(12),
				'role' => 'desa',
				'status' => true,
			],
		);
	}
}
