<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        // $posts = Post::latest()->get();
        // return view('posts.index', compact('posts'));

        $posts = Post::paginate(6); // 6 posts per page
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'title' => 'required|min:3|unique:posts,title',
            'description' => 'required|min:10',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048', // Add validation for the image
        ]);

        // Handle the image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public'); // Store the image in the public folder
        } else {
            $imagePath = null; // If no image, set to null
        }

        // Create the post
        Post::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'user_id' => Auth::id(),
            'image' => $imagePath, // Save the image path in the database
        ]);

        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        // Validate the request
        $validatedData = $request->validate([
            'title' => 'required|min:3|unique:posts,title,' . $post->id,
            'description' => 'required|min:10',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048', // Add validation for the image
        ]);

        // Handle the image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($post->image) {
                Storage::delete('public/' . $post->image); // Delete the old image using Laravel Storage
            }

            // Store the new image
            $imagePath = $request->file('image')->store('images', 'public');
        } else {
            // Keep the existing image path if no new image is uploaded
            $imagePath = $post->image;
        }

        // Update the post
        $post->update([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'image' => $imagePath, // Update the image path
        ]);

        return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
    }

    public function destroy(Post $post)
    {
        // Delete the image from storage if it exists
        if ($post->image) {
            Storage::delete('public/' . $post->image); // Use Laravel's Storage facade
        }

        // Delete the post
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    }
}
