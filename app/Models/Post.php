<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'slug', 'category', 'image'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function booted()
{
    static::created(function ($post) {
        $baseSlug = Str::slug($post->title);
        $slug = $baseSlug;
        $count = 1;

        while (Post::where('slug', $slug)->where('id', '!=', $post->id)->exists()) {
            $slug = $baseSlug . '-' . $count++;
        }

        $post->slug = $slug;
        $post->save();
    });
}

public function getRouteKeyName()
{
    return 'slug';
}

}

