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
        
        // SEO data
        $settings = \App\Models\Setting::first();
        $seoData = [
            'title' => 'News & Updates - ' . ($settings->site_name ?? 'ZGF'),
            'description' => 'Latest news and updates from Zambian Governance Foundation',
            'ogType' => 'blog',
            'schemaMarkup' => $this->getBlogListingSchema($posts)
        ];
        
        return view('news', compact('posts'))->with($seoData);
    }

    // display post details
    public function postDetails(Post $post)
    {
        // SEO data
        $seoData = [
            'title' => $post->meta_title ?? $post->title,
            'description' => $post->meta_description ?? Str::limit(strip_tags($post->content), 160),
            'keywords' => $post->meta_keywords ?? null,
            'ogImage' => $post->featured_image ? Storage::url($post->featured_image) : null,
            'ogType' => 'article',
            'schemaMarkup' => $this->getBlogPostSchema($post)
        ];
        
        return view('posts.show', compact('post'))->with($seoData);
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
    
    /**
     * Generate schema markup for blog listing
     */
    private function getBlogListingSchema($posts)
    {
        $schema = [
            "@context" => "https://schema.org",
            "@type" => "Blog",
            "name" => "ZGF News & Updates",
            "url" => route('news'),
            "description" => "Latest news and updates from Zambian Governance Foundation",
            "blogPosts" => []
        ];
        
        foreach ($posts->take(10) as $post) {
            $schema["blogPosts"][] = [
                "@type" => "BlogPosting",
                "headline" => $post->title,
                "url" => route('post.details', $post->slug),
                "datePublished" => $post->created_at->toIso8601String(),
                "dateModified" => $post->updated_at->toIso8601String(),
                "mainEntityOfPage" => route('post.details', $post->slug),
                "description" => Str::limit(strip_tags($post->content), 160)
            ];
        }
        
        return json_encode($schema);
    }

    /**
     * Generate schema markup for a blog post
     */
    private function getBlogPostSchema($post)
    {
        $settings = \App\Models\Setting::first();
        
        $schema = [
            "@context" => "https://schema.org",
            "@type" => "BlogPosting",
            "headline" => $post->title,
            "name" => $post->title,
            "description" => $post->meta_description ?? Str::limit(strip_tags($post->content), 160),
            "datePublished" => $post->created_at->toIso8601String(),
            "dateModified" => $post->updated_at->toIso8601String(),
            "mainEntityOfPage" => [
                "@type" => "WebPage",
                "@id" => route('post.details', $post->slug)
            ],
            "publisher" => [
                "@type" => "Organization",
                "name" => $settings->site_name ?? "Zambian Governance Foundation",
                "logo" => [
                    "@type" => "ImageObject",
                    "url" => $settings && $settings->site_logo ? Storage::url($settings->site_logo) : asset('images/logo.png')
                ]
            ]
        ];
        
        // Add featured image if available
        if ($post->featured_image) {
            $schema["image"] = [
                "@type" => "ImageObject",
                "url" => Storage::url($post->featured_image),
                "width" => "1200",
                "height" => "630"
            ];
        }
        
        // Add custom schema markup if enabled and provided
        if ($post->enable_schema_markup && $post->schema_markup) {
            try {
                $customSchema = json_decode($post->schema_markup, true);
                if (json_last_error() === JSON_ERROR_NONE) {
                    // Merge custom schema with default schema
                    $schema = array_merge($schema, $customSchema);
                }
            } catch (\Exception $e) {
                // If there's an error parsing the custom schema, just use the default
            }
        }
        
        return json_encode($schema);
    }
}



