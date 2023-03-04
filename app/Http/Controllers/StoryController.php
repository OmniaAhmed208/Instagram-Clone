<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Comment;
use App\Models\User;
use App\Models\Post;
use App\Models\Media;
use Illuminate\Support\Carbon;
use Image;

class StoryController extends Controller
{
    public function index($userId)
    {
        $media = Media::find($userId);
        $allUsers = User::get();

        return view('posts.stories',[
            'media' => $media,
            'users'=> $allUsers,
        ]);
    }

    public function store()
    {}
}
