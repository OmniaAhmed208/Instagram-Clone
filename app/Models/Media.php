<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Media extends Model
{
    use HasFactory;

    protected $table = 'media';

    protected $fillable = [
        'post_id',
        'content_type',
        'content_path',  // we can change it, according to the fetching method
        'alt_text',
    ];

    public function mediaable()
    {
        return $this->morphTo();
    }

    public function post() : BelongsTo
    {
        return $this->belongsTo(Post::class, "post_id");
    }
    // public function post()
    // {
    //     // return $this->belongsTo(User::class, 'foreign_key');
    //     return $this->belongsTo(Post::class, 'post_id');
    // }

    public function path()
    {
        return '/posts/' . $this->id;
    }
}
