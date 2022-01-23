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

    protected $casts = [
        'is_open' => 'boolean',
    ];

    public function user() {
        return $this->belongsTo(User::class)->withDefault([
            'name' => '(退会済)',
        ]);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function scopeOnlyNotDelete($query) {
        return $query->where('is_open', true);
    }
}
