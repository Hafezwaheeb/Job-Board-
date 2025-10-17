<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateComment;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Comment::all();
        return view('comments.index', ['comments' => $data, 'title' => 'Comments']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return redirect('/blog')->with('error', 'Comments can only be added from the blog post page.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateComment $request)
    {
        $comment = new Comment();
        $comment->author = $request->input('author');
        $comment->content = $request->input('content');
        $comment->post_id = $request->input('post_id');
        $comment->save();
        return redirect('/blog/' . $request->post_id)->with('success', 'Comment added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comment = Comment::findOrFail($id);
        return view('comments.show', ['comment' => $comment , 'title' => $comment->author]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Comment::destroy($id);
        return redirect('/comments');
    }
}
