<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

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
}
