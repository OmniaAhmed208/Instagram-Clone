<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentiontag extends Model
{
    use HasFactory;

    protected $table = 'mentions_tags';

    protected $fillable = [
        'mention_or_tag_content',
    ];

    public function mentiontagable()
    {
        return $this->morphTo();
    }
}
