<?php

namespace App\Http\Controllers;

use App\Models\Comment;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $data = Comment::all();
        return view('comments.index', ['comments' => $data , 'title' => 'Comments']);
    }


    public function create()
    {
        Comment::create([
            'content' => 'This is a new comment.',
            'author' => 'Admin',
            'post_id' => 1
            ]);
        return redirect('/comments');
    }
}
