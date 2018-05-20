<?php

use Illuminate\Database\Seeder;

class BreedsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = resource_path('source\breeds.csv');
        $file = file_get_contents($path);
        $source = explode(PHP_EOL, $file);
        $breedsRows = array_map(function($item) {
            return ['name' => $item];
        }, $source);

        DB::table('breeds')->insert($breedsRows);
    }
}
