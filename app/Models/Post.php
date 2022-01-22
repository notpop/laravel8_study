<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [

    ];

    protected $hidden = [

    ];

    public function user() {
        return $this->belongsTo(User::class)->withDefault([
            'name' => '(退会済)',
        ]);
    }
}
