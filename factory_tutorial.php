<?php

// LARAVEL FACTORIES TUTORIAL - PRACTICAL EXAMPLES

use App\Models\Post;
use App\Models\Student;
use App\Models\User;

// ============================================
// 1. BASIC FACTORY USAGE
// ============================================

// Create and save one record to database
$post = Post::factory()->create();
echo "Created post: " . $post->title;

// Create multiple records
$posts = Post::factory()->count(5)->create();
echo "Created " . $posts->count() . " posts";

// ============================================
// 2. MAKE VS CREATE
// ============================================

// make() - Creates model instance WITHOUT saving to database
$post = Post::factory()->make();
echo $post->title; // Has data but not saved

// create() - Creates model instance AND saves to database
$post = Post::factory()->create();
echo $post->id; // Has ID because it's saved

// ============================================
// 3. CUSTOM ATTRIBUTES
// ============================================

// Override specific attributes
$post = Post::factory()->create([
    'title' => 'My Custom Title',
    'published' => true
]);

// Multiple records with custom attributes
$posts = Post::factory()->count(3)->create([
    'author' => 'John Doe'
]);

// ============================================
// 4. FACTORY STATES
// ============================================

// Use the published() state
$publishedPost = Post::factory()->published()->create();

// Use the draft() state
$draftPost = Post::factory()->draft()->create();

// Combine states with custom attributes
$post = Post::factory()->published()->create([
    'title' => 'Important Published Post'
]);

// ============================================
// 5. ARRAYS AND RAW DATA
// ============================================

// Get array of attributes without creating model
$postData = Post::factory()->make()->toArray();

// Get multiple arrays
$postsData = Post::factory()->count(3)->make()->toArray();

// ============================================
// 6. TESTING USAGE
// ============================================

// In a test file:
/*
public function test_post_creation()
{
    $post = Post::factory()->create();

    $this->assertDatabaseHas('post', [
        'id' => $post->id,
        'title' => $post->title
    ]);
}
*/

// ============================================
// 7. SEEDING USAGE
// ============================================

// In a seeder:
/*
public function run()
{
    // Create 50 posts - 40 published, 10 drafts
    Post::factory()->published()->count(40)->create();
    Post::factory()->draft()->count(10)->create();
}
*/
