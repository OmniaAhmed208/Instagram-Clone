<?php

namespace App\Http\Controllers;

use App\Models\Mentiontag;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Metadata\PostCondition;
use App\Models\PostInteraction;

class ProfileController extends Controller
{
    //
    public function index(){

         return view('posts.profile');
    }

    public function saved(){
        $currentUser = Auth::id() ;
        // dd($currentUser);
        // $posts = Post::find($currentUser);
        $posts = PostInteraction::where('watcher_id', $currentUser)->get();
        // dd($posts);

        return view('posts.profile-saved',[
            'posts' => $posts
        ]);
    }

    public function tagged(){
        $currentUser = Auth::id() ;
        // dd($currentUser);
        // $posts = Post::find($currentUser);
        $posts = Mentiontag::where('user_to_id', $currentUser)->get();
        // dd($posts);

        return view('posts.profile-tagged',[
            'posts' => $posts
        ]);
    }
}
