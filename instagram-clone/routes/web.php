<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PostController;


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

Route::get('/home' , [PostController::class, 'index'])->name('home.index');
Route::post('/home', [PostController::class, 'store']);
Route::post('/crop', [PostController::class, 'crop'])->name('post.crop');

Route::get('/explore' , [PostController::class, 'explore'])->name('home.explore');
Route::get('/getPosts', [PostsController::class, 'getPosts'])->name('getPosts');

Route::get('/reels' , [PostController::class, 'reels'])->name('home.reels');
