<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Comment;
use App\Models\Media;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function home(){
        $posts = Post::all();
        // return PostResource::collection(($posts));
        $data = [];
        foreach ($posts as $post){
            $postid = $post-> id;
            $user = User::findorfail($post['post_creator_id']);
            $username = $user->nick_name;
            $userPhoto = $user['user-photo_path'];
            $date = $post['created_at'];
            $media = Media::select('content_path') -> where ('post_id', $postid)-> get();
            
            $likes = $post['likes_counts_settings'];
            $comments_count = $post['comments_settings'];

            $comments = Comment::where ('post_id', $postid) -> get();
            $comments_data = [];
            foreach ($comments as $comment){
                $commentCreator = User::findorfail($comment['comment_writer_id']);
                $commentCreator_name = $commentCreator['nick_name'];
                $commentBody = $comment['comment_content'];
                $commentDate = $comment['created_at'];

                $comment_data=[
                    'username' => $commentCreator_name,
                    'body' => $commentBody,
                    'date' => $commentDate,
                ];
                array_push($comments_data, $comment_data);
            };

            $post_data=[
                'id' => $postid,
                'username' => $username,
                'userPhoto' => $userPhoto,
                'date' => $date,
                'media' => $media,
                'likes' => $likes,
                'comments' => $comments_data
            ];
            array_push($data, $post_data);
        };

        // $post = $posts[1];
        // $postid = $post['id'];
        // $id = $post['post_creator_id'];
        // $username = User::find($id);
        // $media = Media::select('content_path') -> where ('post_id', 3)-> get();
        // $comments = Comment::all();

        return $data;
    }

    public function profile($id){
        $posts = Post::where ('post_creator_id', $id) -> get();
        $data = [];
        foreach ($posts as $post){
            $postid = $post['id'];
            $user = User::findorfail($post['post_creator_id']);
            $username = $user['nick_name'];
            $userPhoto = $user['user-photo_path'];
            $date = $post['created_at'];
            $media = Media::select('content_path') -> where ('post_id', $postid)-> get();
            
            $likes = $post['likes_counts_settings'];
            $comments_count = $post['comments_settings'];

            $comments = Comment::where ('post_id', $postid) -> get();
            $comments_data = [];
            foreach ($comments as $comment){
                $commentCreator = User::findorfail($comment['comment_writer_id']);
                $commentCreator_name = $commentCreator['nick_name'];
                $commentBody = $comment['comment_content'];
                $commentDate = $comment['created_at'];

                $comment_data=[
                    'username' => $commentCreator_name,
                    'body' => $commentBody,
                    'date' => $commentDate,
                ];
                array_push($comments_data, $comment_data);
            };

            $post_data=[
                'id' => $postid,
                'username' => $username,
                'userPhoto' => $userPhoto,
                'date' => $date,
                'media' => $media,
                'likes' => $likes,
                'comments' => $comments_data
            ];
            array_push($data, $post_data);
        };
        
        return $data;
    }
}
