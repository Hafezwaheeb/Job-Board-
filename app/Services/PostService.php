<?php

namespace App\Services;

use App\Models\Post;

class PostService
{
    public function createPost(array $data)
    {
        // Business logic
        $data['published'] = $data['published'] ?? false;
        
        return Post::create($data);
    }

    public function getAllPosts()
    {
        return Post::with('comments', 'tags')->paginate(10);
    }

    public function getPostById(string $id)
    {
        return Post::with('comments', 'tags')->findOrFail($id);
    }

    public function updatePost(string $id, array $data)
    {
        $post = Post::findOrFail($id);
        $post->update($data);
        return $post;
    }

    public function deletePost(string $id)
    {
        $post = Post::findOrFail($id);
        return $post->delete();
    }
}