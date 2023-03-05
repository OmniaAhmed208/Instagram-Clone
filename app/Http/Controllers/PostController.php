<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Media;
use App\Models\PostInteraction;
use Illuminate\Support\Facades\Auth;
use App\Models\Mentiontag;
// use DB;
// use URL;

use Illuminate\Support\Carbon;
// use Intervention\Image\ImageManager;
use Image;

class PostController extends Controller
{
   

    public function index()

    {
        $allPosts = Post::get();
        $allUsers = User::get();
        $allMedia = Media::get();
        $comments = Comment::get();
        // $media_post_id = Media::get('post_id');

        // dd($media_post_id);

        $current = new Carbon(); //time format Carbon
        $date = $current->toDateString();

        return view('posts.index', [ // index => show tables
            'posts' => $allPosts,
            'date' => $date,
            'users'=> $allUsers,
            'allMedia'=> $allMedia,
            'comments' => $comments
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
        $allPosts = Post::all()->sortByDesc('id'); 
        $allUsers = User::get();
        $allLikes = PostInteraction::all()->where('like', 1);
        $allSavings = PostInteraction::all()->where('saving', 1);
        $likesCount = $allLikes->count();
        $savingsCount = $allSavings->count();
        $allComments = Comment::all()->sortByDesc('id'); 
        $commentsCount = $allComments->count();
        // dd($allPosts);

        return view('posts.explore', [
            'posts' => $allPosts,
            'users'=> $allUsers,
            'likes' => $allLikes,
            'savings' => $allSavings,
            'likesCount' => $likesCount,
            'savingsCount' => $savingsCount,
            'allComments' => $allComments,
            'commentsCount' => $commentsCount,
        ]);
    }

    public function explorePost ($postid){
        $post = Post::find($postid);
        
        return redirect()->route('home.index');
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
        $comments = Comment::get();
        $commentsCount = $comments->count();

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
            'commentsCount' => $commentsCount,
            'comments' => $comments,
        ]);
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
        // dd($data['tag']);

        $content = $data['content'];
        // $post_creator_id = $data['select_post'];
        $post_creator_id = Auth::id();

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

        if ($data['tag']) {
            $postid= Post::select('id')->max('id');
            // dd($postid);
            Mentiontag::create([
                'post_id' => $postid,
                'user_from_id' => $post_creator_id,
                'user_to_id' => $data['tag'],
                'mention_or_tag' => 'tag'
            ]);
        }
        

        return back();
    }

    public function edit($postid)
    {
        $post = Post:: find($postid);
        $allUsers = User::get();
      
        // dd($post);
        return view('posts.edit',[
            'post' => $post,
            'users' => $allUsers
            
        ]);
    }
    public function update($postid, Request $request)
    {
        $post = Post :: find($postid);
        $newdata= $request-> all();
        $post->update([
            'caption'=> $newdata['caption']
        ]);
        // dd($newdata);
        // $request->validate([
        //                'title' => ['required', 'min:3'],
        //                'description' => ['required', 'min:5'],
        //            ]);

        return redirect()->route('home.index');
    }

    public function like ($postid){
        $post = Post::find($postid);
        $likesCount = $post['likes_counts_settings']+1;
        $post->update(['likes_counts_settings'=> $likesCount]);
        // dd($likesCount);
        $userid = Auth::id();
        PostInteraction::create([
            'post_id'=>$postid,
            'watcher_id'=>$userid,
            'like'=>1
        ]);
        return redirect()->route('home.index');
    }

    public function save ($postid){
        $userid = Auth::id();
        PostInteraction::create([
            'post_id'=>$postid,
            'watcher_id'=>$userid,
            'saving'=>1
        ]);
        return redirect()->route('home.index');
    }
}
