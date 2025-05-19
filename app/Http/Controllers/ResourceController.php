<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResourceController extends Controller
{
    /**
     * Display a listing of published resources.
     */
    public function index()
    {
        $resources = Resource::where('is_published', true)
            ->latest()
            ->paginate(9);
            
        return view('resources.index', compact('resources'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Resource $resource)
    {
        if (!$resource->is_published) {
            abort(404);
        }

        return view('resources.show', compact('resource'));
    }

    /**
     * Download the specified resource.
     */
    public function download(Resource $resource)
    {
        if (!$resource->is_published) {
            abort(404);
        }

        $resource->increment('download_count');
        
        return Storage::disk('public')->download(
            $resource->file_path,
            Str::slug($resource->title) . '.pdf'
        );
    }
}