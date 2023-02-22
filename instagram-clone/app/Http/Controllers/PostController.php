<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Media;

class PostController extends Controller
{
    public $rowperpage = 10;  //Every explore block has 10 posts.

    public function index()
    {
        return view('posts.index');
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
            $html .= '<div class="col mx-lg-3 flex-fill">
                <a href="" data-bs-toggle="modal" data-bs-target="#explorePostModal">
                    @if ($record[2] || $record[9])
                    <div class="row" style="height:690px;">
                    @else
                        <div class="row">
                    @endif
                        {{-- one explore content start --}}
                        <span>{{ $record->caption }}</span>
                        
                        {{-- one explore content end --}}
                    </div>
                </a>
            </div>';
        }
        $data['html'] = $html;

        return response()->json($data);
    }

    public function reels()
    {
        $reels = Media::all()
        ->where('content_type', 'video')
        ->sortByDesc('id');  //I should have use 'created_at' but it's NULL for these records 
        
        return view('posts.reels',[
            'reels' => $reels,
        ]);
    }

    

}
