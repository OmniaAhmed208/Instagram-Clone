<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PostInteraction extends Model
{
    use HasFactory;

    protected $table = 'post_interaction';

    protected $fillable = [
        'like',
        'saving',
        'post_id',
        'watcher_id'
    ]; 

    public function post() : BelongsTo
    {
        return $this->belongsTo(Post::class, "post_id");
    }
}
