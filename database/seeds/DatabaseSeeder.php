<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BreedsSeeder::class);
        $this->call(HousesSeeder::class);
        $this->call(CatsSeeder::class);
    }
}
