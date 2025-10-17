<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Tag::all();
        return view('tag.index', ['tags' => $data, 'title' => 'Tags']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Tag::create([
            'title' => 'C++'
        ]);
        return redirect('/tags');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $tag = Tag::findOrFail($id);
        return view('tag.show', ['tag' => $tag, 'title' => $tag->title]);
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
        //
    }

    public function insert()
    {
        $tag1 = Tag::find(1);
        $tag2 = Tag::find(2);

        $tag1->posts()->attach([3, 4]);
        $tag2->posts()->attach([5, 6]);
        return response()->json([
            'post1' => $tag1->posts,
            'post2' => $tag2->posts
        ]);
    }
}
