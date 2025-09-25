<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\PostImage;

class PostController extends Controller
{
    // Show posts
   public function index()
    {
        // Fetch posts with their related user & images
        $posts = Post::with(['user', 'images'])->latest()->get();

        // Debug: check if posts are coming
        // dd($posts);

        return view('dashboard.socials', compact('posts'));
    }

    // Store post
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $post = Post::create([
            'content' => $request->content,
            'user_id' => auth()->id(), // ✅ ensure user is saved
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = time().'_'.$image->getClientOriginalName();
                $image->move(public_path('uploads/posts'), $filename);

                $post->images()->create([
                    'image_path' => 'uploads/posts/' . $filename,
                ]);
            }
        }

        return redirect()->route('socials.index');
    }
}
