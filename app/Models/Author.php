<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use App\Models\Article;
use App\Models\Audiences;
use App\Models\Comment;
class Author extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
    public function audiences()
    {
        return $this->hasMany(Audiences::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function audiencess()
    {
        return $this->hasManyThrough(
            Audience::class,
            Article::class
        );
    }
}
