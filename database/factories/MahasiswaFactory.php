<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Mahasiswa;
use Faker\Generator as Faker;

$factory->define(Mahasiswa::class, function (Faker $faker) {
    return [
        'nim' => $faker->randomNumber(9),
        'user_id' => null,
        'nama_depan' => $faker->firstName,
        'nama_belakang' => $faker->lastName,
        'telp' => $faker->phoneNumber,
        'alamat' => $faker->address,
        'provinsi' => 12,
        'kota' => $faker->numberBetween($min = 158, $max = 178),
        'kecamatan' => $faker->numberBetween($min = 1941, $max = 2566),
        'kelurahan' => $faker->numberBetween($min = 25237, $max = 31170),
        'fakultas' => $faker->randomElement(['Fakultas Sains dan Teknologi', 'Fakultas Sosial Humaniora', 'Fakultas Enomoni dan Bisnis', 'Fakultas Agama Islam']),
        'prodi' => $faker->randomElement(['TE', 'IF', 'TI', 'TP', 'FA', 'BIO', 'AGRI', 'ILKOM', 'PSI', 'KTF', 'AP', 'AKUN', 'MAN', 'PAI', 'PIAUD', 'HKI', 'KPI', 'EKSYAR']),
        'semester' => 6,
        'krs' => true,
        'unggah_krs' => 'unggah/krs/nim/',
        'keuangan' => true,
        'unggah_keuangan' => 'unggah/keuangan/nim/'
    ];
});
