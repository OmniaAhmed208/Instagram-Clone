<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostInteraction extends Model
{
    use HasFactory;

    protected $table = 'post_interaction';

    protected $fillable = [
        'like',
        'saving',
    ];
}
