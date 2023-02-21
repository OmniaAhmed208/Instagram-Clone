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

        $current = new Carbon(); //time format Carbon
        $date = $current->toDateString();

        return view('posts.index',[ // index => show tables
            'posts' => $allPosts,
            'date' => $date,
            'users'=> $allUsers,
            'allMedia'=> $allMedia
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

        if($data['cropped'] == null){ //if image not cropped take original image
            $file_extension = request()-> image -> getClientOriginalExtension();
            $file_name = time().'.'.$file_extension;
            $path = 'instagram-Images/posts';
            $request -> image -> move($path,$file_name);
            // dd($file_name);
        }
        else{
            $folderPath = public_path('cropped/');
            $img = explode(';base64', $data['cropped']);
            $img_types = explode('cropped/', $img[0]);
            $file_name = time().'.'.explode('/',explode(':',substr($data['cropped'],0,strpos($data['cropped'], ';')))[1])[1];
            \Image::make($data['cropped'])->save(public_path('instagram-Images/posts/').$file_name );
            // dd($file_name);
        }

        Post::create([
            // 'column-name-in-db'=>'value',
            'post_url' => "kjjkjkj",
            'caption' => "$content",
            'post_creator_id'=> $post_creator_id
        ]);

        $postId = Post::get('id');
        // dd($postId[0]->id);
        // dd($postId->last()->id);

        Media::create([
            'content_type' => "photo",
            'content_path' => $file_name,
            'alt_text' => "photo",
            'post_id' => $postId->last()->id
        ]);

        // return "inserted";
        // return to_route(route:'posts.index');
        return view('posts.index');
    }

}
