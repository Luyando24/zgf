<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hero;
use App\Models\TeamMember;
use App\Models\CommunityInitiative;
use App\Models\Post;
use App\Models\Resource;

class HomeController extends Controller
{
    public function index()
    {   
        // Fetch the first 3 hero images from the database
        $heroes = Hero::orderBy('id', 'desc')->take(3)->get();
        // Fetch the first 3 university images from the database
        $featuredPosts = Post::orderBy('id', 'desc')->take(3)->get();

        $initiatives = CommunityInitiative::orderBy('id', 'desc')->take(3)->get();
        $resources = Resource::orderBy('id', 'desc')->take(3)->get();
        return view('home', compact('heroes', 'featuredPosts', 'initiatives', 'resources'));
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

