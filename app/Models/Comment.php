<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected static function booted() {
        static::deleted(function ($comment) {
            logger('deleted ' . $comment->id);
        });
    }
}
