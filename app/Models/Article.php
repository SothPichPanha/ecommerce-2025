<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Models\Comment;
use App\Models\Audience;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'author_id'];
    
        public function author()
    {
        return $this->belongsTo(Author::class);
    }
    public function comment()
    {
        return $this->morphMany(Comment::class);
    }

}
