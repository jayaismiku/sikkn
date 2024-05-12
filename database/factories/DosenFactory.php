<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Dosen;
use Faker\Generator as Faker;

$factory->define(Dosen::class, function (Faker $faker) {
    return [
        'nidn' => $faker->randomNumber(6),
        'nip' => null,
        'user_id' => null,
        'nama_depan' => $faker->firstName,
        'nama_belakang' => $faker->lastName,
        'gelar_depan' => null,
        'gelar_belakang' => null,
        'pangkat' => $faker->randomElement(['Penata Muda Tk.I', 'Penata Madya Tk.I', 'Penata Muda Tk.II', 'Penata Madya Tk.II']),
        'golongan' => $faker->randomElement(['III/a', 'III/b', 'III/c', 'III/d', 'III/e']),
        'fakultas' => $faker->randomElement(['Fakultas Sains dan Teknologi', 'Fakultas Sosial Humaniora', 'Fakultas Enomoni dan Bisnis', 'Fakultas Agama Islam']),
        'prodi' => $faker->randomElement(['TE', 'IF', 'TI', 'TP', 'FA', 'BIO', 'AGRI', 'ILKOM', 'PSI', 'KTF', 'AP', 'AKUN', 'MAN', 'PAI', 'PIAUD', 'HKI', 'KPI', 'EKSYAR']),
        'telp' => $faker->phoneNumber,
        'alamat' => $faker->address,
        'provinsi' => 12,
        'kota' => $faker->numberBetween($min = 158, $max = 178),
        'kecamatan' => $faker->numberBetween($min = 1941, $max = 2566),
        'kelurahan' => $faker->numberBetween($min = 25237, $max = 31170),
    ];
});
