<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use RyanChandler\Comments\Concerns\HasComments;
use RyanChandler\Comments\Contracts\IsComment;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Post extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    use HasComments;

    protected $fillable = [
        'title',
        'post_template',
        'resumen',
        'slug',
        'seo_keywords',
        'user_id',
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comment(string $content, Model $user = null, IsComment $parent = null, string $guest_name = ''): IsComment
    {
        return $this->comments()->create([
            'content' => $content,
            'user_id' => $user ? $user->getKey() : Auth::id(),
            'parent_id' => $parent?->getKey(),
            'guest_name' => $guest_name,
        ]);
    }
}