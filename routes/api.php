<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PostController;

// use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('test1', function(){
//     return 'from test';
// });

Route::get('home', [PostController::class, 'home']);
Route::get('profile/{id}', [PostController::class, 'profile']);
// Route::resource('/reels' , [PostController::class, 'reels']);
// Route::get('/reels' , [PostController::class, 'reels']);
