<?php

namespace App\Http\Controllers;

use App\Models\CommunityInitiative;
use Illuminate\Http\Request;

class CommunityInitiativeController extends Controller
{
    /**
     * Display a listing of community initiatives.
     */
    public function index(Request $request)
    {
        $initiatives = CommunityInitiative::where('status', 'published')
            ->when($request->category, function($query, $category) {
                return $query->where('category', $category);
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();
            
        $categories = CommunityInitiative::where('status', 'published')
            ->distinct()
            ->pluck('category')
            ->filter()
            ->values();
            
        return view('initiatives.index', compact('initiatives', 'categories'));
    }
    
    /**
     * Display the specified initiative.
     */
    public function show($slug)
    {
        $initiative = CommunityInitiative::where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();
            
        return view('initiatives.show', compact('initiative'));
    }

    //Display 3 initiatives to the homepage
    
}