<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InstagramPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InstagramPostController extends Controller
{
    public function index()
    {
        $posts = InstagramPost::latest()->paginate(5);
        return view('admin.instagram-posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.instagram-posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link' => 'required|url',
        ]);

        $imagePath = $request->file('image')->store('instagram-posts', 'public');

        InstagramPost::create([
            'image_path' => $imagePath,
            'link' => $request->link,
        ]);

        return redirect()->route('admin.instagram-posts.index');
    }

    public function edit(InstagramPost $instagramPost)
    {
        return view('admin.instagram-posts.edit', ['post' => $instagramPost]);
    }

    public function update(Request $request, InstagramPost $instagramPost)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link' => 'required|url',
        ]);

        $imagePath = $instagramPost->image_path;
        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($imagePath);
            $imagePath = $request->file('image')->store('instagram-posts', 'public');
        }

        $instagramPost->update([
            'image_path' => $imagePath,
            'link' => $request->link,
        ]);

        return redirect()->route('admin.instagram-posts.index');
    }

    public function destroy(InstagramPost $instagramPost)
    {
        Storage::disk('public')->delete($instagramPost->image_path);
        $instagramPost->delete();

        return redirect()->route('admin.instagram-posts.index');
    }
}