<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User; // Import the User model
use Illuminate\Support\Str;
class Post extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    protected static function booted()
{
    static::creating(function ($post) {
        $post->slug = Str::slug($post->title);
    });
}
}
