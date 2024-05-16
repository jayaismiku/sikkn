<?php

use Illuminate\Database\Seeder;

class PendampingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Pendamping::class, 50)->create();
    }
}
