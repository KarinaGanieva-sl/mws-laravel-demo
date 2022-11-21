<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $collection = collect([
            ['name' => 'Valery', 'length' => 1.65, 'weight' => 70],
            ['name' => 'Kamila', 'length' => 1.53, 'weight' => 45],
            ['name' => 'Sasha', 'length' => 1.78, 'weight' => 60],
            ['name' => 'Dima', 'length' => 1.88, 'weight' => 80],
            ['name' => 'Nathan', 'length' => 1.70, 'weight' => 55]
        ]);
        $collection = $collection->map(function ($person) {
            $person['bmi'] = $person['weight'] / $person['length'] ** 2;
            return $person;
        });
        $collection_to_string = $collection->map(function ($person) {
            return sprintf('Person %s, has a bmi of %f', $person['name'], $person['bmi']);
        });
        return view('Welcome', ['coll' => $collection_to_string]);
    }
}
