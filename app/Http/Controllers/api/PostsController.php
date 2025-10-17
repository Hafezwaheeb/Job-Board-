<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePostRequest;
use App\Services\PostService;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct(private PostService $postService) {}

    public function index()
    {
        $posts = $this->postService->getAllPosts();
        return response()->json($posts);
    }

    public function store(CreatePostRequest $request)
    {
        $post = $this->postService->createPost($request->validated());
        return response()->json($post, 201);
    }

    public function show(string $id)
    {
        $post = $this->postService->getPostById($id);
        return response()->json($post);
    }

    public function update(CreatePostRequest $request, string $id)
    {
        $post = $this->postService->updatePost($id, $request->validated());
        return response()->json($post);
    }

    public function destroy(string $id)
    {
        $this->postService->deletePost($id);
        return response()->json(null, 204);
    }
}