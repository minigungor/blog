<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{
    protected $fillable = [
        'title',
        'text',
        'author',
    ];

    protected function casts(): array
    {
        return [
            'posted_at' => 'datetime',
        ];
    }
}
