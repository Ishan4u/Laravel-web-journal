<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;



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

// User related routes
Route::get('/', [userController::class, "showCorrectHomepage"])->name('login');
Route::post('/register', [userController::class, 'register'])->middleware('guest');
Route::post('/login', [userController::class, 'login'])->middleware('guest');
Route::post('/logout', [userController::class, 'logout'])->middleware('auth');

// Blog post related routes
Route::get('/create-post', [PostController::class, 'showCreateForm'])->middleware('auth');
Route::post('/create-post', [PostController::class, 'storeNewPost'])->middleware('auth');
Route::get('/post/{post}', [PostController::class, 'viewSinglePost']);