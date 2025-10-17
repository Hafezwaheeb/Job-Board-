<?php

// ADVANCED FACTORY TECHNIQUES

use App\Models\Post;
use App\Models\Comment;
use App\Models\User;

// ============================================
// 1. RELATIONSHIPS IN FACTORIES
// ============================================

// Create a post with 3 comments
$post = Post::factory()
    ->has(Comment::factory()->count(3))
    ->create();

// Alternative syntax
$post = Post::factory()
    ->hasComments(3)
    ->create();

// Create comments for existing post
$post = Post::factory()->create();
$comments = Comment::factory()
    ->forPost($post->id)
    ->count(5)
    ->create();

// ============================================
// 2. FACTORY CALLBACKS
// ============================================

// Configure factory after creation
$post = Post::factory()
    ->afterCreating(function ($post) {
        // Add 3 comments to each post
        Comment::factory()->count(3)->create([
            'post_id' => $post->id
        ]);
    })
    ->create();

// ============================================
// 3. CONDITIONAL STATES
// ============================================

// In your factory, add conditional logic
/*
public function definition(): array
{
    $isPublished = $this->faker->boolean(70); // 70% published

    return [
        'title' => $this->faker->sentence(),
        'content' => $this->faker->paragraphs(3, true),
        'author' => $this->faker->name(),
        'published' => $isPublished,
        'published_at' => $isPublished ? $this->faker->dateTimeBetween('-1 month', 'now') : null,
    ];
}
*/

// ============================================
// 4. FACTORY SEQUENCES
// ============================================

// Create posts with sequential titles
$posts = Post::factory()
    ->count(5)
    ->sequence(
        ['title' => 'First Post'],
        ['title' => 'Second Post'],
        ['title' => 'Third Post'],
        ['title' => 'Fourth Post'],
        ['title' => 'Fifth Post'],
    )
    ->create();

// ============================================
// 5. FACTORY WITH CUSTOM LOGIC
// ============================================

// In CommentFactory, add method for realistic comments
/*
public function realistic(): static
{
    $commentTypes = [
        'Great post!',
        'Thanks for sharing this.',
        'I disagree with this point.',
        'Very informative, learned a lot.',
        'Could you elaborate on this?'
    ];

    return $this->state([
        'content' => $this->faker->randomElement($commentTypes)
    ]);
}
*/

// Usage:
$comments = Comment::factory()->realistic()->count(10)->create();

// ============================================
// 6. TESTING WITH FACTORIES
// ============================================

// Test example
/*
public function test_post_has_comments()
{
    $post = Post::factory()
        ->has(Comment::factory()->count(3))
        ->create();

    $this->assertCount(3, $post->comments);
    $this->assertEquals($post->id, $post->comments->first()->post_id);
}
*/

// ============================================
// 7. SEEDING WITH RELATIONSHIPS
// ============================================

// In DatabaseSeeder or PostSeeder
/*
public function run()
{
    // Create 10 posts, each with 2-5 comments
    Post::factory()
        ->count(10)
        ->has(
            Comment::factory()
                ->count($this->faker->numberBetween(2, 5))
        )
        ->create();
}
*/
