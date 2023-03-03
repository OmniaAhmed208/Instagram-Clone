<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable = [
        'comment_content',
        'comment_writer_id',
        'post_id'
    ];

    public function commentable()
    {
        return $this->morphTo();
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class, "comment_writer_id");
    } 

    public function post() : BelongsTo
    {
        return $this->belongsTo(Post::class, "post_id");
    }
}
