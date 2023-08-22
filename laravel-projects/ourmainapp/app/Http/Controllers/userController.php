<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Follow;
use Illuminate\Http\Request;
use App\Events\OurExampleEvent;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\View;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Models\User; //Models perform crud oparation and relationships


class userController extends Controller
{

    public function storeAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|max:3000'
        ]);

        $user = auth()->user();
        $filename = $user->id . '-' . uniqid() . '.jpg';

        $imgData = Image::make($request->file('avatar'))->fit(120)->encode('jpg');
        Storage::put('public/avatars/' . $filename, $imgData);

        $oldAvatar = $user->avatar;

        $user->avatar = $filename; // Database user table avatar column 
        $user->save(); // Save to database

        if ($oldAvatar != "/fallback-avatar.jpg") {
            Storage::delete(str_replace("/storage/", "public/", $oldAvatar));
        }

        return back()->with('success', 'Congrates on the new avatar.');
    }

    public function showAvatarForm()
    {
        return view('avatar-form');
    }

    // function for get shared data in blade template
    private function getSharedData($user)
    {
        $currentlyFollowing = 0;

        if (auth()->check()) {
            $currentlyFollowing = Follow::where([['user_id', '=', auth()->user()->id], ['followeduser', '=', $user->id]])->count();
        }
        View::share('sharedData', ['currentlyFollowing' => $currentlyFollowing, 'avatar' => $user->avatar, 'username' => $user->username, 'postCount' => $user->posts()->count()]);
    }
    public function profile(User $user)
    {
        $this->getSharedData($user);

        return view('profile-posts', ['posts' => $user->posts()->latest()->get()]);
    }

    public function profileRaw(User $user)
    {
        return response()->json(['theHTML'=> view('profile-posts-only',['posts' => $user->posts()->latest()->get()])->render(), 'docTitle'=> $user->username . "'s Profile"]);
    }

    public function profileFollowers(User $user)
    {
        $this->getSharedData($user);

        //test retrun raw json 
        // return $user->followers()->latest()->get();

        return view('profile-followers', ['followers' => $user->followers()->latest()->get()]);
    }

    public function profileFollowersRaw(User $user)
    {
        return response()->json(['theHTML'=> view('profile-followers-only',['followers' => $user->followers()->latest()->get()])->render(), 'docTitle'=> $user->username . "'s followers"]);
    }

    public function profileFollowing(User $user)
    {
        $this->getSharedData($user);

        return view('profile-following', ['following' => $user->followingTheseUsers()->latest()->get()]);
    }

    public function profileFollowingRaw(User $user)
    {
        return response()->json(['theHTML'=> view('profile-following-only',['following' => $user->followingTheseUsers()->latest()->get()])->render(), 'docTitle'=> $user->username . "'s following"]);
       
    }

    public function logout()
    {

        event(new OurExampleEvent(['username' => auth()->user()->username, 'action' => 'Logout'])); // STEP 4;
        auth()->logout();
        return redirect('/')->with('success', 'You are now logged out.');
    }

    public function showCorrectHomepage()
    {

        // if (auth()->check()) {
        //     $currentlyFollowing = Follow::where([['user_id', '=', auth()->user()->id], ['followeduser', '=', $post->user_id]])->count();
        // }


        if (auth()->check()) {
            return view('homepage-feed', ['posts' => auth()->user()->feedPosts()->where('approval', 1)->latest()->get()]);
        } else {
            return view('homepage');
        }
    }


    public function showFeauturedPosts()
    {
        $feauturedPosts = Post::where([
            ['isFeatured', true],
            ['approval', true]
        ])->get();



        if (auth()->check()) {
            return view('homepage-feautured', ['feauturedPosts' => $feauturedPosts]);
        } else {
            return view('homepage');
        }
    }

    public function login(Request $request)
    {
        $incomingFields = $request->validate([
            'loginusername' => 'required',
            'loginpassword' => 'required'
        ]);

        if (auth()->attempt(['username' => $incomingFields['loginusername'], 'password' => $incomingFields['loginpassword']])) {
            $request->session()->regenerate();
            event(new OurExampleEvent(['username' => auth()->user()->username, 'action' => 'Login'])); // STEP 4
            return redirect('/')->with('success', 'You are now logged in');
        } else {
            return redirect('/')->with('failure', 'Invalid login.');
        }
    }

    public function register(Request $request)
    {
        $incomingField = $request->validate([
            'username' => ['required', 'min:4', 'max:20', Rule::unique('users', 'username')],
            'phone' => ['required', 'min:10', 'max:12'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'confirmed']
        ]);

        $incomingField['password'] = bcrypt($incomingField['password']);

        $user = User::create($incomingField); //saving database
        auth()->login($user);
        return redirect('/')->with('success', 'Thank you for creating an account');
    }
}