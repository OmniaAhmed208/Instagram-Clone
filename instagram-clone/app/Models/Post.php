<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'caption',
        'address_address',
        'likes_counts_settings',
        'comments_settings',
    ];

    public function media()
    {
        return $this->hasMany(Media::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function postInteractions()
    {
        return $this->hasMany(PostInteraction::class);
    }

    public function mentionTag()
    {
        return $this->hasMany(Mentiontag::class);
    }
}
