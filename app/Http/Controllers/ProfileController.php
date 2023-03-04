<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function show(User $user):View{
        
        $userPosts = Post::where('post_creator_id', $user->id)->get();
        return view('posts.profile',[
            'user' => $user,
            'posts' => $userPosts,
        ]);

    }

    public function store(Request $request){

        $request->validate([
            'user_photo_path' => ['required']
        ]);

        $user = User::query()->firstWhere('user_photo_path', $request->user_photo_path);

        $data = $request->all();

        $fileName = time().$request->file('user_photo_path')->getClientOriginalName();
        $path = $request->file('user_photo_path')->storeAs('profile_pic', $fileName, 'public');
        $data["user_photo_path"] = "/storage/".$path;

        $user->update(
            array_merge(
                $request->all(),
                [
                    'id' => auth()->user()->id
                ]
            )
        );
    }

    public function update(Request $request, User $user){
    

        if($user->is(auth()->user())){

            $user->update(
                $request->except('user_photo_path')
            );

            if($request->hasFile('user_photo_path')){
                Storage::disk('public')->put('profile_pic', $request->file('user_photo_path'));

                $user->update([
                    'user_photo_path' => $request->file('user_photo_path')->hashName()
                ]);
            }
        }
        
        return to_route('profile.index', $user);
    }
}
