<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'caption',
        'post_url',
        'post_creator_id',
        'address_address',
        'likes_counts_settings',
        'comments_settings',
        'content_type',
        'content_path',
        'alt_text',
    ];

    public function media()
    {
        // return $this->hasMany(Media::class);
        return $this->morphMany(Comment::class, 'mediaable');
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class, "post_creator_id");
    }   

    public function comments()
    {
        // return $this->hasMany(Comment::class);
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function postInteractions()
    {
        return $this->hasMany(PostInteraction::class);
    }

    public function mentionTag()
    {
        // return $this->hasMany(Mentiontag::class);
        return $this->morphMany(Comment::class, 'mentiontagable');
    }

    public function hashtag()
    {
        return $this->morphMany(Comment::class, 'hashtaggable');
    }

    // public function user()
    // {
    //     // return $this->belongsTo(User::class, 'foreign_key');
    //     return $this->belongsTo(User::class, 'post_creator_id');
    // }

    public function path()
    {
        return '/posts/' . $this->id;
    }
}
