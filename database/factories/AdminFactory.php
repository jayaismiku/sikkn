<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Admin;
use Faker\Generator as Faker;

$factory->define(Admin::class, function (Faker $faker) {
    return [
        'admin_id' => '',
        'user_id' => '',
        'nama_depan' => $faker->firstName,
        'nama_belakang' => $faker->lastName
    ];
});
