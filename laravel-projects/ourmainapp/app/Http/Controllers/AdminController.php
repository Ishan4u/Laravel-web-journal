<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function showAdminpage(User $user) {
        return view('admin-content',[ 'user' => $user ]);
    }
}
