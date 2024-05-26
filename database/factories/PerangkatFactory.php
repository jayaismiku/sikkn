<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Perangkat;
use Faker\Generator as Faker;

$factory->define(Perangkat::class, function (Faker $faker) {
    return [
        'nama_lengkap' => $faker->name(),
        'jabatan' => $faker->randomElements(['Kepala Desa', 'Sekretaris Desa', 'Pegawai Desa', 'Kepala Dusun', 'Ketua RW', 'Ketua RT']),
        'telp' => $faker->e164PhoneNumber(),
        'desa_id' => $faker->numberBetween(1, 25),
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s"),
    ];
});
