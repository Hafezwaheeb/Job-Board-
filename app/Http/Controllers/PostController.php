<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $data = Post::all();
        return view('post.index', ['posts' => $data , 'title' => 'Blog']);
    }

    public function show($id) {
        $post = Post::findOrFail($id);
        return view('post.show', ['post' => $post , 'title' => $post->title]);
    }
    public function create()
    {
        Post::create([
            'title' => 'New Post',
            'content' => 'This is the content of the new post.',
            'author' => 'Admin',
            'published' => true
        ]);
        return redirect('/blog');
    }
    public function delete()
    {
            Post::destroy(2);
            return redirect('/blog');
    }
}
