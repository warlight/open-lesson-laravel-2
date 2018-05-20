<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CatsController extends Controller
{
    public function index()
    {
		$cats = DB::table('cats')
            ->leftJoin('breeds', 'cats.breed_id', 'breeds.id')
            ->leftJoin('houses', 'cats.house_id', 'houses.id')
            ->select('cats.id', 'cats.name', 'cats.age', 'cats.breed_id', 'cats.house_id', 'breeds.name as breed', 'houses.name as house')
            ->get();
		
		foreach ($cats as $cat) {
            $cat->years = round($cat->age / 12, 1);
            $cat->is_kitten = $cat->age < 1;
        }

        return view('cats_list', compact('cats'));
    }

    public function breeds()
    {
		$cats_by_breed = DB::table('breeds')
            ->leftJoin(
                DB::raw('(select `cats`.`breed_id`, count(id) as cats_count from `cats` group by `breed_id`) as cats'), 'breeds.id',
                'cats.breed_id'
            )
            ->select('breeds.id', 'breeds.name as breed', 'cats.cats_count')
            ->orderBy('cats.cats_count', 'desc')
            ->get();

        foreach ($cats_by_breed as $cats) {
            if (is_null($cats->cats_count)) {
                $cats->cats_count = 0;
            }
        }
        return view('breeds_list', compact('cats_by_breed'));
    }

    public function statistics()
    {
        $catsCount = DB::table('cats')->get()->count();
        $kittensCount = DB::table('cats')->where('age', '<', 12)->get()->count();
        $catsWithoutHouse = DB::table('cats')->whereNull('house_id')->get()->count();
        $catsWithoutBreed = DB::table('cats')->whereNull('breed_id')->get()->count();
        $catsWithoutBreedAndHouse = DB::table('cats')->whereNull('breed_id')->whereNull('house_id')->get()->count();
        $catsKittensWithoutBreedAndHouse = DB::table('cats')->where('age', '<', 12)->whereNull('breed_id')->whereNull('house_id')->get()->count();
        return view('statistics', compact(
			'catsCount',
			'kittensCount',
			'catsWithoutHouse',
			'catsWithoutBreed',
			'catsWithoutBreedAndHouse',
			'catsKittensWithoutBreedAndHouse'
		));
    }
}
