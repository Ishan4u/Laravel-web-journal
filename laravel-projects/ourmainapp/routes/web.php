<?php

use App\Events\ChatMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\userController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FollowController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/admin-only', [AdminController::class, "showAdminpage"])->middleware('can:visitAdminPages');

// User related routes
Route::get('/', [userController::class, "showCorrectHomepage"])->name('login');
Route::post('/register', [userController::class, 'register'])->middleware('guest');
Route::post('/login', [userController::class, 'login'])->middleware('guest');
Route::post('/logout', [userController::class, 'logout'])->middleware('mustBeLoggedIn');
Route::get('/manage-avatar', [userController::class, 'showAvatarForm'])->middleware('mustBeLoggedIn');
Route::post('/manage-avatar', [userController::class, 'storeAvatar'])->middleware('mustBeLoggedIn');


// Follow related routes
Route::post('/create-follow/{user:username}', [FollowController::class, 'createFollow'])->middleware('mustBeLoggedIn');
Route::post('/remove-follow/{user:username}', [FollowController::class, 'removeFollow'])->middleware('mustBeLoggedIn');

// Blog post related routes
Route::get('/create-post', [PostController::class, 'showCreateForm'])->middleware('mustBeLoggedIn');
Route::post('/create-post', [PostController::class, 'storeNewPost'])->middleware('mustBeLoggedIn');
Route::get('/post/{post}', [PostController::class, 'viewSinglePost']);
Route::delete('/post/{post}', [PostController::class, 'delete'])->middleware('can:delete,post');
Route::get('/post/{post}/edit', [PostController::class, 'showEditForm'])->middleware('can:update,post');
Route::put('/post/{post}', [PostController::class, 'actuallyUpdate'])->middleware('can:update,post');
Route::get('/search/{term}', [PostController::class, 'search']);

// Profile related routes
Route::get('/profile/{user:username}', [userController::class, 'profile']);
// Route::get('/admin-profile/{user:username}', [userController::class, 'adminprofileView']);

//toggle
Route::get('/changeStatus', [AdminController::class, 'changeStatus']);

// STEP 1
// chat routes
Route::post('/send-chat-message', function (Request $request) {

    //validation
    $formFields = $request->validate([
        'textvalue' => 'required'
    ]);

    // trim white space b4 and after that value
    if (!trim(strip_tags($formFields['textvalue']))) {
        return response()->noContent();
    }

    //if valid msg
    broadcast(new ChatMessage(['username' => auth()->user()->username, 'textvalue' => strip_tags($request->textvalue), 'avatar' => auth()->user()->avatar]))->toOthers();
    return response()->noContent();

})->middleware('mustBeLoggedIn');