<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
	return [
		'judul' => $faker->words(4, true),
		'slug' => $faker->slug(4, false),
		'deskripsi' => $faker->paragraphs(3, true),
		'penulis' => $faker->numberBetween(2, 5),
		'created_at' => date("Y-m-d H:i:s"),
		'updated_at' => date("Y-m-d H:i:s"),
	];
});
