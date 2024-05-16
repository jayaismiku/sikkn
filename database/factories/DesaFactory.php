<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Desa;
use Faker\Generator as Faker;

$factory->define(Desa::class, function (Faker $faker) {
    return [
        'nama_desa' => 'desa-' . Str::random(3),
        'alamat' => $faker->address,
        'provinsi' => 12,
        'kota' => $faker->numberBetween($min = 158, $max = 178),
        'kecamatan' => $faker->numberBetween($min = 1941, $max = 2566),
        'kelurahan' => $faker->numberBetween($min = 25237, $max = 31170),
        'longitude' => latitude($min = -6.2, $max = -7.2),
        'latitude' => longitude($min = 107, $max = 108),
        'status' => true
    ];
});
