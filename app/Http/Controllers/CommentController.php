<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $comment = $request->all();
        $userid = Auth::id();
        // dd($user);
       
        Comment::create([
            // 'post_id' => $post_id,
            'post_id' => $comment['post_id'],
            'comment_content' => $comment['comment'],
            'comment_writer_id' => $userid
        ]);

            return redirect()->route('home.index');
     }
}
