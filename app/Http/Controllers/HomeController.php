<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hero;
use App\Models\TeamMember;
use App\Models\CommunityInitiative;
use App\Models\Post;
use App\Models\Resource;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * Fetch recent Facebook posts for the homepage
     *
     * @return \Illuminate\Support\Collection
     */
    private function getRecentFacebookPosts()
    {
        $pageId = config('services.facebook.page_id');
        $accessToken = config('services.facebook.access_token');
        $baseUri = config('services.facebook.base_uri');
        $limit = 4; // Number of posts to display
        
        try {
            $response = Http::withOptions([
                'verify' => true,
                'timeout' => 30,
                'connect_timeout' => 30,
            ])->get($baseUri.'/'.$pageId."/feed", [
                'access_token' => $accessToken,
                'fields' => 'message,full_picture,created_time,permalink_url,likes.summary(true),comments.summary(true),shares',
                'limit' => $limit
            ]);
            
            if ($response->successful()) {
                return collect($response->json()['data'] ?? []);
            }
            
            return collect([]);
        } catch (\Exception $e) {
            \Log::error('Facebook API Error: ' . $e->getMessage());
            return collect([]);
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $heroes = Hero::where('status', 'published')->get();
        $featuredPosts = Post::where('status', 'published')->latest()->take(3)->get();
        $initiatives = CommunityInitiative::where('status', 'published')->latest()->take(3)->get();
        $resources = Resource::where('status', 'published')->latest()->take(3)->get();
        $facebookPosts = $this->getRecentFacebookPosts();
        
        return view('home', compact('heroes', 'featuredPosts', 'initiatives', 'resources', 'facebookPosts'));
    }

    public function WhatWeDo()
    {
        return view('what-we-do');
    }

    public function impact()
    {
        return view('impact');
    }

    public function join()
    {
        return view('get-involved');
    }

    public function howWeDoIt()
    {   
        $teamMembers = TeamMember::take(6)->get();
        return view('how-we-do-it', compact('teamMembers'));
    }
}


