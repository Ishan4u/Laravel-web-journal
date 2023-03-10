<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //

    public function storeNewPost() {
        return 'hii';
    }

    public function showCreateForm() {
        return view('create-post');
    }
}
