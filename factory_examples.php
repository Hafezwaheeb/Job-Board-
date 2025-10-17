<?php

// Factory Usage Examples

use App\Models\Post;
use App\Models\Student;
use App\Models\Comment;
use App\Models\User;

// 1. Create single record
$post = Post::factory()->create();
$student = Student::factory()->create();
$post = Post::factory()->create();

// 2. Create multiple records
$posts = Post::factory()->count(5)->create();
$students = Student::factory()->count(10)->create();
$posts = Post::factory()->count(5)->create();
$students = Student::factory()->count(10)->create();

// 3. Create without saving to database (make)
$post = Post::factory()->make();

// 4. Create with specific attributes
$post = Post::factory()->create([
    'title' => 'Custom Title',
    'published' => true
]);

// 5. Create array of attributes without model
$postData = Post::factory()->make()->toArray();

// 6. Factory States (custom variations)
// Add to PostFactory:
/*
public function published(): static
{
    return $this->state(['published' => true]);
}

public function draft(): static
{
    return $this->state(['published' => false]);
}
*/

// Usage:
// $publishedPost = Post::factory()->published()->create();
// $draftPost = Post::factory()->draft()->create();

// 7. Relationships (if you have them)
// $user = User::factory()
//     ->has(Post::factory()->count(3))
//     ->create();



// How can I run a factory with relationships?

$postrelation = Post::factory()->has(Comment::factory()->count(3))->create();
// 8. After creating callbacks
$postWithComments = Post::factory()
    ->afterCreating(function ($post) {
        Comment::factory()->count(3)->create(['post_id' => $post->id]);
    })
    ->create();
