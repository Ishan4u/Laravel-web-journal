<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Follow;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    //
    public function createFollow(User $user) {
        // you cannot follow your self
        // you connot following someone you're following

        $newFollow = new Follow;
        $newFollow->user_id = auth()->user()->id;
        $newFollow->followeduser = $user->id;
        $newFollow->save();

    }

    public function removeFollow() {

    }

}
