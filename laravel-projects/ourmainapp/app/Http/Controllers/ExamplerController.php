<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExamplerController extends Controller
{
    public function homepage() {
        // imagine we loaded data from the database
        $ourname = 'ishan';
        $animals = ['cat', 'dog', 'cow']; //array
        
        return view('homepage', ['allAnimals' => $animals, 'name' => $ourname, 'catname' => 'Nachu']);
    }

    public function aboutPage() {
        return view('single-post');
    }
}
