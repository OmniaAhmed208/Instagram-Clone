<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Media;
use App\Models\PostInteraction;
// use DB;
// use URL;

use Illuminate\Support\Carbon;
// use Intervention\Image\ImageManager;
use Image;

class PostController extends Controller
{
    // public function index(){
    //     $allPosts = Post ::all();
    //     $allComments = Comment :: all();
    //     return view('posts.index',[
    //         'posts'=> $allPosts,
    //         'comments' => $allComments
    //     ]);
    // }

    public function index()

    {
        $allPosts = Post::get();
        $allUsers = User::get();
        $allMedia = Media::get();
        // $media_post_id = Media::get('post_id');

        // dd($media_post_id);

        $current = new Carbon(); //time format Carbon
        $date = $current->toDateString();

        return view('posts.index', [ // index => show tables
            'posts' => $allPosts,
            'date' => $date,
            'users'=> $allUsers,
            'allMedia'=> $allMedia,
            // '$media_post_id' => $media_post_id
        ]);
    }



    public function search()
    {
        return view('posts.search_offcanvas');
    }

    public function notifications()
    {
        return view('posts.notif_offcanvas');
    }

    public function explore()
    {
        $allPosts = Post::all()
        ->sortByDesc('id'); 
        $allLikes = PostInteraction::all()->where('like', 1);
        $allSavings = PostInteraction::all()->where('saving', 1);
        $likesCount = $allLikes->count();
        $savingsCount = $allSavings->count();
        // dd($allPosts);

        return view('posts.explore', [
            'posts' => $allPosts,
            'likes' => $allLikes,
            'savings' => $allSavings,
            'likesCount' => $likesCount,
            'savingsCount' => $savingsCount,
        ]);
    }

    public function reels()
    {
    $allPosts = Post::all()
        ->where('content_type', 'mp4')
        ->sortByDesc('id');
    $allUsers = User::get();
    $allMedia = Media::get();
    // $media_post_id = Media::get('post_id');
    $allLikes = PostInteraction::all()->where('like', 1);
    $allSavings = PostInteraction::all()->where('saving', 1);
    $likesCount = $allLikes->count();
    $savingsCount = $allSavings->count();
    

    // dd($allPosts);

    $current = new Carbon(); //time format Carbon
    $date = $current->toDateString();

    return view('posts.reels', [
            'posts' => $allPosts,
            'date' => $date,
            'users'=> $allUsers,
            'allMedia'=> $allMedia,
            // '$media_post_id' => $media_post_id
            'likes' => $allLikes,
            'savings' => $allSavings,
            'likesCount' => $likesCount,
            'savingsCount' => $savingsCount,
    ]);

        // $posts = Post::all()
        // ->where('content_type', 'mp4')
        // ->sortByDesc('id');
        // $data = [];
        // // $mediaArray = [];
        // foreach ($posts as $post) {
        //     $postid = $post-> id;
        //     $user = User::findorfail($post['post_creator_id']);
        //     $username = $user->nick_name;
        //     $userPhoto = $user['user-photo_path'];
        //     $date = $post['created_at'];
        //     $media = Media::select('content_path') -> where('post_id', $postid)-> get();

        //     // dd($posts);
        //     // $file = DB::table('posts')->where('id', $post->id)->first();
        //     // $files = explode('|', $file->content_path);
		// 	// foreach ($files as $index => $media){
        //     //     if (substr(strrchr($media,'.'),1) == 'mp4' && $post->post_creator_id == $user->id){
        //     //         $mediaUrl = URL::to($media);
        //     //     }
        //     // }
        //     $likes = $post['likes_counts_settings'];
        //     $comments_count = $post['comments_settings'];

        //     $comments = Comment::where('post_id', $postid) -> get();
        //     $comments_data = [];
        //     foreach ($comments as $comment) {
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
        //     return view('posts.reels',  [
        //         'posts' => $posts,
        //         'postid' => $postid,
        //         'users' => $user,
        //         'user' => $user,
        //         'date' => $date,
        //         //media =>
        //         // 'mediaUrl' => URL::to($media),
        //         'likes' => $likes,
        //         'comments_count' => $comments_count,
        //         //comments =>
        //     ]);
        // }
    }

    public function create()
    {
        $user = User::get();
        return view('posts.app', [
            'Users'=> $user,
        ]);
    }

    public function store(Request $request)
    {
        // dd($_POST);
        $data = request()->all();
        // dd($data);

        $content = $data['content'];
        $post_creator_id = $data['select_post'];

        // if($data['cropped'] == null){ //if image not cropped take original image
        //     $file_extension = request()-> image -> getClientOriginalExtension();
        //     $file_name = time().'.'.$file_extension;
        //     $path = 'instagram-Images/posts';
        //     $request -> image -> move($path,$file_name);
        //     // dd($file_name);
        // }
        // else{
        //     $folderPath = public_path('cropped/');
        //     $img = explode(';base64', $data['cropped']);
        //     $img_types = explode('cropped/', $img[0]);
        //     $file_name = time().'.'.explode('/',explode(':',substr($data['cropped'],0,strpos($data['cropped'], ';')))[1])[1];
        //     // \Image::make($data['cropped'])->save(public_path('instagram-Images/posts/').$file_name );
        //     // dd($file_name);
        // }

        $image = array();
        $extension = array();

        if ($files = $request->file('image')) {
            foreach ($files as $file) {
                $imgName = md5(rand(1000, 10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $file_full_name = $imgName.'.'.$ext;
                $uploadPath = 'instagram-Images/posts/';
                $img_url = $uploadPath.$file_full_name;
                $file->move($uploadPath, $file_full_name);
                $image[]= $img_url;
                $extension[]= $ext;
            }
        }

        Post::create([
            // 'column-name-in-db'=>'value',
            'post_url' => "kjjkjkj",
            'caption' => "$content",
            'post_creator_id'=> $post_creator_id,
            'content_type' => implode('|', $extension),
            'content_path' => implode('|', $image),
            'alt_text' => "photo",
        ]);

        return back();
    }
}
