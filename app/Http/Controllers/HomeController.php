<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\InstagramPost;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::with('products')->latest()->get();
        $instagramPosts = InstagramPost::latest()->get();

        return view('index', compact('categories', 'instagramPosts'));
    }
}