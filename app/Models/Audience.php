<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use App\Models\Article;
use App\Models\Comment;
class Audience extends Model
{
    use HasFactory;
    protected $table = 'audiences';
    protected $fillable = ['name', 'author_id', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

        public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
