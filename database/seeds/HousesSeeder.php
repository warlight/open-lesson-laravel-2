<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use Carbon\Carbon;

class HousesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('ru_RU');
        for ($i = 0; $i < 100; $i++) {
            DB::table('houses')->insert(['name' => $faker->address, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        }
    }
}
