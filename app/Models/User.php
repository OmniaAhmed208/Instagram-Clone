<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     protected $table = 'users';

    protected $fillable = [
        'first_name',
        'last_name',
        'nick_name',
        'email',
        'password',
        'gender',
        'birth_year',
        'user_photo_path',
        'mobile',
        'bio',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'user_image'
    ];

    public function followers()
    {
        return $this->hasMany(User::class);
    }

    // public function posts()
    // {
    //     return $this->hasMany(Post::class, "post_creator_id");
    // }


    public function comments()
    {
        // return $this->hasMany(Comment::class);
        return $this->morphMany(Comment::class, 'commentable');
    }


    public function media()
    {
        // return $this->hasMany(Media::class);
        return $this->morphMany(Comment::class, 'mediaable');
    }

    public function mentionTag()
    {
        // return $this->hasMany(Mentiontag::class);
        return $this->morphMany(Comment::class, 'mentiontagable');
    }

    public function profileImage()
    {
        if(is_null($this->user_photo_path)){
            return asset('default.jpg');
        }

        return Storage::disk('public')->url('profile_pic/'. $this->user_photo_path);
    
    }

    // public function password()
    // {
    //     return Attribute::set(
    //         fn() => bcrypt($this->password)
    //     );
    // }

    // public function run(){
    //     User::factory()
    //     ->count(3)
    //     ->hasPosts(1)
    //     ->create();
    // }
}
