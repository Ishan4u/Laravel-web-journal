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
        if ($user->id == auth()->user()->id) {
            return back()->with('failure', 'You cannot follow yourself');
        }

        // you connot following someone you're following
        $existCheck = Follow::where([['user_id', '=', auth()->user()->id], ['followeduser', '=', $user->id]])->count();

        if($existCheck) {
            return back()->with('failure', 'You are already following that user');
        }

        $newFollow = new Follow;
        $newFollow->user_id = auth()->user()->id;
        $newFollow->followeduser = $user->id;
        $newFollow->save();

    }

    public function removeFollow() {

    }

}
