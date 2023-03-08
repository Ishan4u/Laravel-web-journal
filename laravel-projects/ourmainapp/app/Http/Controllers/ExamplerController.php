<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExamplerController extends Controller
{
    public function homepage() {
        // imagine we loaded data from the database
        $ourname = 'ishan';

        
        return view('homepage', ['name' => $ourname, 'catname' => 'Nachu']);
    }

    public function aboutPage() {
        return '<h1>About page!!!</h1><a href="/">Back to home</a>';
    }
}
