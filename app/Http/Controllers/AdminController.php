<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class AdminController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('dashboard', compact('posts'));
    }

    public function create()
    {
        return view('create');
    }

    // Store a new post
   public function store(Request $request)
{
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'body' => 'required|string'
    ]);

    $post = new Post();
    $post->title = $validatedData['title'];
    $post->body = $validatedData['body'];
    $post->save();

    return redirect()->route('dashboard')->with('success', 'Post created successfully!');
}

    public function edit(Post $post)
    {
        return view('create', compact('post'));
    }

    public function update(Request $request, $id)
    {
        // Find the post by ID
        $post = Post::findOrFail($id);

        // Update the post's data
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->updated_at = now(); 

        // Save the post
        $post->save();

        return redirect()->route('dashboard')->with('success', 'Post updated successfully!');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('success', 'Post deleted successfully!');
    }


}
