<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; 
use App\Models\Comment; 


class HomeController extends Controller
{
        public function index()
    {
        $posts = Post::latest()->get(); 
        return view('welcome', compact('posts')); 
    }


    public function show(Post $post) 
{
    return view('posts', ['post' => $post]);
}


    public function store(Request $request)
{
    $request->validate([
        'post_id' => 'required|exists:posts,id',
        'email' => 'nullable|email',
        'content' => 'required|string'
    ]);

    Comment::create([
        'post_id' => $request->post_id,
        'email' => $request->email,
        'content' => $request->content
    ]);

    return redirect()->back()->with('success', 'Comment added successfully!');
}

}
