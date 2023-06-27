<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'title', 'content',
        'published', 'published_at',
    ];

    protected $casts = [
        'published' => 'boolean',
    ];

    protected $dates = [
        'published_at' => 'boolean',
    ];
}
