<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
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
    public function storeForReels(Request $request)
    {
        $comment = $request->all();
        $userid = Auth::id();
        $allUsers = User::get();
        $user_to_write_comment = User::find()->where('id',  $userid);
        // dd($user);
       
        Comment::create([
            // 'post_id' => $post_id,
            'post_id' => $comment['post_id'],
            'comment_content' => $comment['comment'],
            'comment_writer_id' => $userid
        ]);

        return redirect()->route('home.reels', [
            'users' => $allUsers,
            'user_to_write_comment' => $user_to_write_comment,
        ]);
    }
}
