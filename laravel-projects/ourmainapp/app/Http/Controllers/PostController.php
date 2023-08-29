<?php

namespace App\Http\Controllers;

use App\Jobs\SendNewPostEmail;
use Parsedown;
use App\Models\Post;
use App\Models\Follow;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use League\HTMLToMarkdown\HtmlConverter;

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
        // $incomingFields['body'] = strip_tags($incomingFields['body'],"<style><p><ul><ol><li><strong><em><h1><h2><h3><h3><br><table><tr><th><td>");
        

        $post->update($incomingFields);

        if ($request->hasFile('thumb')) { // Check if a new image is selected
            $post_id = $post->id;
            $imgName = $post_id . '-' . uniqid() . '.jpg';
            $imgData = Image::make($request->file('thumb'))->fit(682, 369)->encode('jpg');
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

        // parse markdown to html
        // $parsedown = new Parsedown();
        // parsedown->text($post->body)

        // $post['body'] = strip_tags(Str::markdown($post->body), '<style><p><ul><ol><li><strong><em><h3><br><table><tr><th><td>');
        $post['body'] = $post->body;
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
        // $incomingFields['body'] = strip_tags($incomingFields['body'],"<table><th><tr><td>");
        $incomingFields['user_id'] = auth()->id();

        $newPost = Post::create($incomingFields);

        $post_id = $newPost->id; // STEP 3
        $imgName = $post_id . '-' . uniqid() . '.jpg';
        $imgData = Image::make($request->file('thumb'))->fit(682, 369)->encode('jpg'); // STEP 2
        Storage::put('public/thumb/' . $imgName, $imgData); // STEP 4

        $oldThumb = $newPost->thumb;

        // Save img name to database
        $newPost->thumb = $imgName; // STEP 5
        $newPost->save(); // STEP 6

        if ($oldThumb != "/default-thumb.jpg") {
            Storage::delete(str_replace("/storage/", "public/", $oldThumb));

        }

        dispatch(new SendNewPostEmail(['sendTo' => auth()->user()->email, 'name' => auth()->user()->username, 'title' => $newPost->title]));
        
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

    //update featured AJAX route
    public function updateFeatured(Request $request) {
        
        $postId = $request->input('post_id');
        $status = $request->input('status');

        $post = Post::find($postId);
        $post->isFeatured = $status;
        $post->save();

        return response()->json([
            'status' => 200,
            'message' => 'Featured status updated successfuly',
            'isFeatured' => $status,
        ]);
    }
}