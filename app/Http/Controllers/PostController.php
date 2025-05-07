<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Career;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('is_published', true)->latest()->paginate(10);
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'featured_image' => 'nullable|image|max:2048',
            'meta_title' => 'nullable|string|max:60',
            'meta_description' => 'nullable|string|max:160',
            'meta_keywords' => 'nullable|string',
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('posts', 'public');
        }

        Post::create($validated);

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    // display news page
    public function newsPage()
    {
        $posts = Post::where('is_published', true)->latest()->paginate(10);
        return view('news', compact('posts'));
    }

    // display post details
    public function postDetails(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    //career page
    public function careerPage(Request $request)
{
    $jobs = Career::query()
        ->when($request->title, fn($q) => $q->where('title', 'like', '%' . $request->title . '%'))
        ->when($request->category, fn($q) => $q->where('category', $request->category))
        ->when($request->location, fn($q) => $q->where('location', 'like', '%' . $request->location . '%'))
        ->latest()
        ->paginate(8)
        ->withQueryString();

    return view('careers', compact('jobs'));
}    

    //Job details page
    public function careerDetails(Career $career)
    {   // get job
        return view('job.show', [
            'job' => $career,
            'career' => $career, // ✅ This is what was missing
        ]);
    }
    
}

