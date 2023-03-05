<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Mentiontag extends Model
{
    use HasFactory;

    protected $table = 'mentions_tags';

    protected $fillable = [
        'mention_or_tag_content',
        'post_id',
        'user_from_id',
        'user_to_id'
    ];

    public function mentiontagable()
    {
        return $this->morphTo();
    }

    public function post() : BelongsTo
    {
        return $this->belongsTo(Post::class, "post_id");
    }
}
