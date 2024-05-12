<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Pendamping;
use Faker\Generator as Faker;

$factory->define(Pendamping::class, function (Faker $faker) {
    return [
        'pendamping_id' => 'dpl-'.Str::random(3),
        'user_id' => null,
    ];
});
