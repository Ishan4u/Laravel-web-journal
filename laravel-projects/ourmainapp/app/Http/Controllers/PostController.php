<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Follow;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    //
    public function search($term)
    {
        $posts = Post::search($term)->where('approval', 1)->get();
        $posts->load('user:id,username,avatar');
        return $posts;
    }
    public function actuallyUpdate(Post $post, Request $request)
    {
        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'thumb' => 'nullable|image|max:10000' // STEP 1
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);

        $post->update($incomingFields);

        if ($request->hasFile('thumb')) { // Check if a new image is selected
            $post_id = $post->id;
            $imgName = $post_id . '-' . uniqid() . '.jpg';
            $imgData = Image::make($request->file('thumb'))->fit(600, 400)->encode('jpg');
            Storage::put('public/thumb/' . $imgName, $imgData);

            $oldThumb = $post->thumb;

            // Save img name to database
            $post->thumb = $imgName;
            $post->save();

            if ($oldThumb != "/default-thumb.jpg") {
                Storage::delete(str_replace("/storage/", "public/", $oldThumb));
            }
        }

        return back()->with('success', 'Post successfully updated.');
    }

    public function showEditForm(Post $post)
    {
        return view('edit-post', ['post' => $post]);
    }

    public function delete(Post $post)
    {

        $post->delete();
        return redirect('/profile/' . auth()->user()->username)->with('success', 'Post successfully deleted.');
    }

    public function viewSinglePost(Post $post)
    {
        $currentlyFollowing = 0;
        if (!auth()->check() && !$post->approval == 1) {
            return redirect('/');
        }
        if (auth()->check()) {
            $currentlyFollowing = Follow::where([['user_id', '=', auth()->user()->id], ['followeduser', '=', $post->user_id]])->count();
        }

        $post['body'] = strip_tags(Str::markdown($post->body), '<p><ul><ol><li><strong><em><h3><br>');
        return view('single-post', ['post' => $post, 'currentlyFollowing' => $currentlyFollowing]);
    }

    public function storeNewPost(Request $request)
    {
        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'thumb' => 'required|image|max:10000' // STEP 1
        ]);



        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        $incomingFields['user_id'] = auth()->id();

        $newPost = Post::create($incomingFields);

        $post_id = $newPost->id; // STEP 3
        $imgName = $post_id . '-' . uniqid() . '.jpg';
        $imgData = Image::make($request->file('thumb'))->fit(600, 400)->encode('jpg'); // STEP 2
        Storage::put('public/thumb/' . $imgName, $imgData); // STEP 4

        $oldThumb = $newPost->thumb;

        // Save img name to database
        $newPost->thumb = $imgName; // STEP 5
        $newPost->save(); // STEP 6

        if ($oldThumb != "/default-thumb.jpg") {
            Storage::delete(str_replace("/storage/", "public/", $oldThumb));

        }

        return redirect("/post/{$newPost->id}")->with('success', 'New post successfully created');
    }

    public function showCreateForm()
    {
        return view('create-post');
    }

    // view test page function
    public function showTest(){
        return view('test');
    }
}