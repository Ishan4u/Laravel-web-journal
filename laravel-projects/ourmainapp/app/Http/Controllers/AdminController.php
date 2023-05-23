<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function showAdminpage() {
        $users = User::all();
        $posts = Post::latest()->get();
        return view('admin-content',compact('users'), compact('posts'));
    }

    public function changeStatus(Request $request)
    {
        $post = Post::find($request->post_id);
        $post->approval = $request->approval;
        $post->save();
  
        return response()->json(['success'=>'Status change successfully.']);
    }

}
