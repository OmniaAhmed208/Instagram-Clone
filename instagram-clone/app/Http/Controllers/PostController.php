<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class PostController extends Controller
{
    public function index(){
        $allPosts = Post ::all();
        $allComments = Comment :: all();
        return view('posts.index',[
            'posts'=> $allPosts,
            'comments' => $allComments
        ]);
    
    }
    

    public function search(){
        return view('posts.search_offcanvas');
    }

    public function notifications(){
        return view('posts.notif_offcanvas');
    }

    public function explore(){
        return view('posts.explore');
    }

    public function reels(){
        return view('posts.reels');
    }

    

}
