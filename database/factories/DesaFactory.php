<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Desa;
use Faker\Generator as Faker;

$factory->define(Desa::class, function (Faker $faker) {
    return [
        'nama_desa' => 'desa-' . Str::random(3),
        'alamat' => $faker->address,
        'provinsi_id' => 12,
        'kota_id' => $faker->numberBetween($min = 158, $max = 178),
        'kecamatan_id' => $faker->numberBetween($min = 1941, $max = 2566),
        'kelurahan_id' => $faker->numberBetween($min = 25237, $max = 31170),
        'longitude' => null,
        'latitude' => null,
        'status' => true,
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s"),
    ];
});
