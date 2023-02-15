<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        return view('posts.index');
    }

    public function explore(){
        return view('posts.explore');
    }

    public function reels(){
        return view('posts.reels');
    }

}
