<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // $data = [];
        // foreach ($posts as $post){
        //     $postid = $post-> id;
        //     $user = User::findorfail($post['post_creator_id']);
        //     $username = $user->nick_name;
        //     $userPhoto = $user['user-photo_path'];
        //     $date = $post['created_at'];
        //     $media = Media::select('content_path') -> where ('post_id', $postid)-> get();
            
        //     $likes = $post['likes_counts_settings'];
        //     $comments_count = $post['comments_settings'];

        //     $comments = Comment::where ('post_id', $postid) -> get();
        //     $comments_data = [];
        //     foreach ($comments as $comment){
        //         $commentCreator = User::findorfail($comment['comment_writer_id']);
        //         $commentCreator_name = $commentCreator['nick_name'];
        //         $commentBody = $comment['comment_content'];
        //         $commentDate = $comment['created_at'];

        //         $comment_data=[
        //             'username' => $commentCreator_name,
        //             'body' => $commentBody,
        //             'date' => $commentDate,
        //         ];
        //         array_push($comments_data, $comment_data);
        //     };
        return [
            'postid' => $this->id,
            'user' => new UserResource($this->user),
            'date' => $this->created_at,
            //media =>
            'likes' => $this->likes_counts_settings,
            'comments_count' => $this->comments_settings,
            //comments
        ];
    }
}
