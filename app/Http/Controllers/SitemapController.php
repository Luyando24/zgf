<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Career;
use App\Models\CommunityInitiative;
use App\Models\Resource;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index()
    {
        $content = view('sitemap.index')->render();
        return response($content)->header('Content-Type', 'text/xml');
    }
    
    public function pages()
    {
        $pages = [
            [
                'url' => url('/'),
                'lastmod' => now()->toIso8601String(),
                'priority' => '1.0',
                'changefreq' => 'daily'
            ],
            [
                'url' => route('what-we-do'),
                'lastmod' => now()->toIso8601String(),
                'priority' => '0.8',
                'changefreq' => 'weekly'
            ],
            [
                'url' => route('impact'),
                'lastmod' => now()->toIso8601String(),
                'priority' => '0.8',
                'changefreq' => 'weekly'
            ],
            [
                'url' => route('join'),
                'lastmod' => now()->toIso8601String(),
                'priority' => '0.8',
                'changefreq' => 'weekly'
            ],
            [
                'url' => route('news'),
                'lastmod' => now()->toIso8601String(),
                'priority' => '0.8',
                'changefreq' => 'daily'
            ],
            [
                'url' => route('contact'),
                'lastmod' => now()->toIso8601String(),
                'priority' => '0.7',
                'changefreq' => 'monthly'
            ],
            [
                'url' => route('careers'),
                'lastmod' => now()->toIso8601String(),
                'priority' => '0.7',
                'changefreq' => 'weekly'
            ],
        ];
        
        return response()->view('sitemap.pages', compact('pages'))
            ->header('Content-Type', 'text/xml');
    }
    
    public function posts()
    {
        $posts = Post::where('is_published', true)
            ->latest()
            ->get();
            
        return response()->view('sitemap.posts', compact('posts'))
            ->header('Content-Type', 'text/xml');
    }
    
    public function initiatives()
    {
        $initiatives = CommunityInitiative::where('status', 'published')
            ->latest()
            ->get();
            
        return response()->view('sitemap.initiatives', compact('initiatives'))
            ->header('Content-Type', 'text/xml');
    }
    
    public function careers()
    {
        $careers = Career::where('is_active', true)
            ->latest()
            ->get();
            
        return response()->view('sitemap.careers', compact('careers'))
            ->header('Content-Type', 'text/xml');
    }
    
    public function resources()
    {
        $resources = Resource::latest()->get();
            
        return response()->view('sitemap.resources', compact('resources'))
            ->header('Content-Type', 'text/xml');
    }
}