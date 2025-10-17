<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data =  Post::paginate(5);
        return response()->json([
            'data' => $data,
            'message' => 'Posts retrieved successfully'
        ], 200);
    }

    /**23
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $date = Post::create($request->all());
        return response()->json([
            'data' => $date,
            'message' => 'Post created successfully'
        ], 200);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Post::find($id);
        return response()->json([
            'data' => $data,
            'message' => 'Post retrieved successfully'
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $request->validate([
        //     // Add your validation rules here
        // ]);

        $post = Post::find($id);

        if (!$post) {
            return response()->json([
                'message' => 'Post not found'
            ], 404);
        }

        $post->update($request->all());

        return response()->json([
            'data' => $post->fresh(),
            'message' => 'Post updated successfully'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Post::find($id);
        $data->delete();
        return response()->json([
            'data' => $data,
            'message' => 'Post deleted successfully'
        ]);
    }
}
