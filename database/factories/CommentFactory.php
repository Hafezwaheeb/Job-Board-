<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'post_id' => Post::factory(), // Creates a related post
            'author' => $this->faker->name(),
            'content' => $this->faker->paragraph(),
        ];
    }

    // State for short comments
    public function short(): static
    {
        return $this->state([
            'content' => $this->faker->sentence()
        ]);
    }

    // State for long comments
    public function long(): static
    {
        return $this->state([
            'content' => $this->faker->paragraphs(3, true)
        ]);
    }

    // State for specific post
    public function forPost($postId): static
    {
        return $this->state([
            'post_id' => $postId
        ]);
    }
}