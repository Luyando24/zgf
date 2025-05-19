<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hero;
use App\Models\University;
use App\Models\Degree;
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
        //Fetch all degrees from the database
        $studyOptions = Degree::all();
        //Fetch first 6 cities from the database
        $initiatives = CommunityInitiative::orderBy('id', 'desc')->take(3)->get();
        $degrees = Degree::all();
        $resources = Resource::orderBy('id', 'desc')->take(3)->get();
        return view('home', compact('heroes', 'featuredPosts', 'studyOptions', 'initiatives', 'degrees', 'resources'));
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
        return view('how-we-do-it');
    }
}

