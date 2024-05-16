<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$faker = Faker::create('id_ID');
        DB::table('users')->insert([
            'nama_depan' => $faker->firstName,
            'nama_belakang' => $faker->lastName,
        ]);	
    }
}
