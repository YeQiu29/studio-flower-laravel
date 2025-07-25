<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('blog', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('single-post', compact('post'));
    }
}