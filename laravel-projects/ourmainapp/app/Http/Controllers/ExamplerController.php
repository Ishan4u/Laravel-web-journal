<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExamplerController extends Controller
{
    public function homepage() {
        return view('homepage');
    }

    public function aboutPage() {
        return '<h1>About page!!!</h1><a href="/">Back to home</a>';
    }
}
