<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cat;
use App\Breed;

class CatsController extends Controller
{
    public function index()
    {
		$cats = Cat::with('breed', 'house')->get();
        return view('cats_list', compact('cats'));
    }

    public function breeds()
    {
		$cats_by_breed = Breed::withCount('cats')->orderBy('cats_count', 'desc')->get();
        return view('breeds_list', compact('cats_by_breed'));
    }

    public function statistics()
    {
        $catsCount = Cat::count();
        $kittensCount = Cat::kittens()->count();
        $catsWithoutHouse = Cat::noHouse()->count();
        $catsWithoutBreed = Cat::noBreed()->count();
        $catsWithoutBreedAndHouse = Cat::noBreed()->noHouse()->count();
        $catsKittensWithoutBreedAndHouse = Cat::kittens()->noBreed()->noHouse()->count();
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
