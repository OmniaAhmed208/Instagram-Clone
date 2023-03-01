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
}
