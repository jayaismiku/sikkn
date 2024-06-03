<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Mahasiswa;
use Faker\Generator as Faker;

$factory->define(Mahasiswa::class, function (Faker $faker) {
    return [
        'nim' => $faker->randomNumber(9),
        'user_id' => $faker->numberBetween($min = 22, $max = 51),
        'nama_lengkap' => $faker->name,
        'alamat' => $faker->address,
        'kelurahan_id' => $faker->numberBetween($min = 25237, $max = 31170),
        'kecamatan_id' => $faker->numberBetween($min = 1941, $max = 2566),
        'kota_id' => $faker->numberBetween($min = 158, $max = 178),
        'provinsi_id' => '12',
        'telp' => $faker->e164PhoneNumber,
        'fakultas' => $faker->randomElement(['FST', 'FSH', 'FEB', 'FAI']),
        'prodi' => $faker->randomElement(['TE', 'IF', 'TI', 'TP', 'BIO', 'FA', 'AGRI', 'ILKOM', 'PSI', 'KTF', 'AP', 'AK', 'MAN', 'PAI', 'PIAUD', 'HKI', 'KPI', 'EKSYAR']),
        'semester' => '6',
    ];
});
