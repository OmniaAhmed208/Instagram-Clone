<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Media;
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
        $media_post_id = Media::get('post_id');

        // dd($media_post_id);

        $current = new Carbon(); //time format Carbon
        $date = $current->toDateString();

        return view('posts.index',[ // index => show tables
            'posts' => $allPosts,
            'date' => $date,
            'users'=> $allUsers,
            'allMedia'=> $allMedia,
            '$media_post_id' => $media_post_id
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




    public function create(){

        $user = User::get();
        return view('posts.app',[
            'Users'=> $user,
        ]);
    }

    public function store(Request $request){

        // dd($_POST);
        $data = request()->all();
        // dd($data);

        $content = $data['content'];
        $post_creator_id = $data['select_post'];


        $image = array();
        $extension = array();

        if($files = $request->file('image')){
            foreach($files as $file){
                $imgName = md5(rand(1000,10000));
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
