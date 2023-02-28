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
    public $rowperpage = 6;  //Every explore block has 10 posts.

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
        // Number of rowsperpage
        $data['rowperpage'] = $this->rowperpage;

        // Total number of records
        $data['totalrecords'] = Post::select('*')->count();

        // Fetch 4 records
        $data['posts'] = Post::select('*') 
               ->skip(0)
               ->take($this->rowperpage)
               ->get();
               
        // Load index view
        return view('posts.explore', [
            $data,
            'rowperpage' => $data['rowperpage'],
            'totalrecords' => $data['totalrecords'],
            'posts' => $data['posts'],
        ]);
    }

    // Fetch records for explore page loading posts
    public function getPosts(Request $request){

        $start = $request->get("start");
        
        // Fetch records
        $records = Post::select('*') 
            ->skip($start)
            ->take($this->rowperpage)
            ->get();
            
        $html = "";
        foreach($records as $record){
            $html .= "<div class='col mx-lg-3 flex-fill'>
                        <a href='{{" .$record->path(). "}}' data-bs-toggle='modal' data-bs-target='#explorePostModal'>
                            {{-- @if (" .$records->first(). "||" .$records->last(). ")
                                <div class='row' style='height:690px;'>
                            @else --}}
                                <div class='row'>
                            {{-- @endif --}}
                                {{-- one explore content start --}}
                                <span>{{" .$record->caption. "}}</span>
                                @foreach (".$record->media()." as ".$media.")
                                    @if (".$media->content_type." == 'video')
                                        @yield('oneExplore-video-Content')
                                    @else
                                        @yield('oneExplore-photo-Content')
                                    @endif
                                @endforeach
                                {{-- one explore content end --}}
                            </div>
                        </a>
                    </div>";
        }
        $data['html'] = $html;

        return response()->json([
            $data,
            'html' => $data['html'],
        ]);
    }

    public function reels()
    {
        $reels = Media::all()
        ->where('content_type', 'video')
        ->sortByDesc('id');  //I should have use 'created_at' but it's NULL for these records 
        
        // return view('posts.reels',[
        //     'reels' => $reels,
        // ]);
        return response()->json([
            'reels' => $reels,
        ]);
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
