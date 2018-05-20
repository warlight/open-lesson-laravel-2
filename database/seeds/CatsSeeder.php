<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use Carbon\Carbon;

class CatsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('en_EN');

        for ($i = 0; $i < 500; $i++) {
            $cat = [
                'name' => $faker->name,
                'age' => rand(0, (15 * 12)),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];
            if ((bool)rand(0, 1)) {
                $cat['breed_id'] = DB::table('breeds')->orderByRaw("RAND()")->first()->id;
            }
            if ((bool)rand(0, 1)) {
                $cat['house_id'] = DB::table('houses')->orderByRaw("RAND()")->first()->id;
            }

            DB::table('cats')->insert($cat);
        }

    }
}
