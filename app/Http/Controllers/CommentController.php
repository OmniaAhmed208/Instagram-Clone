<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    public function store($id, Request $request)
    {
        $comment = $request->all();
        
        // $post_id = $id;
        Comment::create([
            // 'post_id' => $post_id,
            // 'comment_writer_id' => $user_id,
            'comment_content' => $comment['comment'],
        ]);

            return redirect()->route('home.index');
     }
}
