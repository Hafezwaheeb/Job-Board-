<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'post';
    protected $fillable = ['title', 'content', 'author', 'published'];

    protected $guarded = ['id'];


    // relation with comments
    // A function that returns all comments for a post and refers to Comment model
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function tags() {
        return $this->belongsToMany(Tag::class);
    }
}
