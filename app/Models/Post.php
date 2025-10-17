<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    use HasUuids;

    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $table = 'post';
    protected $fillable = ['title', 'content', 'author', 'published'];


    // relation with comments
    // A function that returns all comments for a post and refers to Comment model
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    // Factory helper methods
    public static function createSamplePosts($count = 5)
    {
        return static::factory()->count($count)->create();
    }

    public static function createPublishedPosts($count = 3)
    {
        return static::factory()->published()->count($count)->create();
    }

    public static function createPostWithComments($commentCount = 3)
    {
        return static::factory()->hasComments($commentCount)->create();
    }
}
