<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::get('/register', [AuthController::class, 'register'])->name('register');

Route::post('/register', [AuthController::class, 'registerSave'])->name('register.save');


Route::post('/login', [AuthController::class, 'loginAction'])->name('login.action');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/profile/{user}' , [ProfileController::class, 'show'])->name('profile.index')->middleware('auth');

Route::post('/profile' , [ProfileController::class, 'store'])->name('profile.store')->middleware('auth');

Route::put('/profile/{user}/update', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');

Route::get('/home' , [PostController::class, 'index'])->name('home.index')->middleware('auth');

Route::post('/home', [PostController::class, 'store']);

Route::post('/crop', [PostController::class, 'crop'])->name('post.crop');

Route::get('/explore' , [PostController::class, 'explore'])->name('home.explore');

Route::get('/getPosts', [PostsController::class, 'getPosts'])->name('getPosts');

Route::get('/reels' , [PostController::class, 'reels'])->name('home.reels');

Route::post('/home/{post}/comment', [CommentController::class, 'store'])->name('comments.store');

// Route::get('/stories' , [PostController::class, 'index'])->name('story.index');
// Route::post('/stories', [PostController::class, 'store']);
