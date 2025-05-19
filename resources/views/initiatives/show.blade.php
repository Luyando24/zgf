@extends('layouts.app')

@section('title', $initiative->title)

@section('content')
<section class="container my-5">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('initiatives.index') }}">Initiatives</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $initiative->title }}</li>
        </ol>
    </nav>

    <div class="row">
        <!-- Main Content -->
        <div class="col-lg-8">
            <!-- Initiative Header -->
            <h1 class="heading mb-3">{{ $initiative->title }}</h1>
            
            <div class="d-flex flex-wrap gap-3 mb-4">
                <span class="badge bg-primary rounded-pill fs-6">{{ $initiative->category }}</span>
                <span class="text-muted">
                    <i class="bi bi-geo-alt-fill"></i> {{ $initiative->location }}
                </span>
                <span class="text-muted">
                    <i class="bi bi-calendar-event"></i> 
                    {{ $initiative->start_date->format('M d, Y') }} - {{ $initiative->end_date->format('M d, Y') }}
                </span>
            </div>

            <!-- Cover Image -->
            <div class="mb-4">
                <img src="{{ asset('storage/' . $initiative->cover_image) }}" 
                     class="img-fluid rounded-4 shadow-sm" 
                     alt="{{ $initiative->title }}">
            </div>

            <!-- Summary -->
            <div class="card bg-light border-0 rounded-4 mb-4">
                <div class="card-body">
                    <h5 class="card-title">Summary</h5>
                    <p class="card-text">{{ $initiative->summary }}</p>
                </div>
            </div>

            <!-- Description -->
            <div class="mb-5">
                <h4 class="mb-3">About This Initiative</h4>
                <div class="initiative-content">
                    {!! $initiative->description !!}
                </div>
            </div>

            <!-- Video (if available) -->
            @if($initiative->video_url)
            <div class="mb-5">
                <h4 class="mb-3">Watch Our Video</h4>
                <div class="ratio ratio-16x9">
                    @php
                        // Convert YouTube URL to embed format
                        $videoId = '';
                        if (preg_match('/youtube\.com\/watch\?v=([^&]+)/', $initiative->video_url, $match)) {
                            $videoId = $match[1];
                        } elseif (preg_match('/youtu\.be\/([^?]+)/', $initiative->video_url, $match)) {
                            $videoId = $match[1];
                        }
                    @endphp
                    
                    @if($videoId)
                        <iframe src="https://www.youtube.com/embed/{{ $videoId }}" 
                                title="{{ $initiative->title }}" 
                                allowfullscreen 
                                class="rounded-4 shadow-sm"></iframe>
                    @else
                        <div class="alert alert-warning">
                            <a href="{{ $initiative->video_url }}" target="_blank" rel="noopener noreferrer">
                                Watch video (external link)
                            </a>
                        </div>
                    @endif
                </div>
            </div>
            @endif
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <div class="card border-0 rounded-4 shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="card-title">Initiative Details</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <span>Created by</span>
                            <span class="fw-bold">{{ $initiative->created_by }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <span>Start Date</span>
                            <span class="fw-bold">{{ $initiative->start_date->format('M d, Y') }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <span>End Date</span>
                            <span class="fw-bold">{{ $initiative->end_date->format('M d, Y') }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <span>Location</span>
                            <span class="fw-bold">{{ $initiative->location }}</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="card border-0 rounded-4 shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="card-title">Get Involved</h5>
                    <p class="card-text">Interested in supporting this initiative? Contact us to learn how you can contribute.</p>
                    <a href="{{ route('contact') }}" class="btn btn-primary w-100">Contact Us</a>
                </div>
            </div>

            <!-- Share Buttons -->
            <div class="card border-0 rounded-4 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Share This Initiative</h5>
                    <div class="d-flex gap-2">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" 
                           class="btn btn-outline-primary" 
                           target="_blank" 
                           rel="noopener noreferrer">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($initiative->title) }}" 
                           class="btn btn-outline-info" 
                           target="_blank" 
                           rel="noopener noreferrer">
                            <i class="bi bi-twitter"></i>
                        </a>
                        <a href="https://wa.me/?text={{ urlencode($initiative->title . ' - ' . request()->url()) }}" 
                           class="btn btn-outline-success" 
                           target="_blank" 
                           rel="noopener noreferrer">
                            <i class="bi bi-whatsapp"></i>
                        </a>
                        <a href="mailto:?subject={{ urlencode($initiative->title) }}&body={{ urlencode('Check out this initiative: ' . request()->url()) }}" 
                           class="btn btn-outline-secondary">
                            <i class="bi bi-envelope"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Initiatives -->
<section class="py-5 bg-light">
    <div class="container">
        <h3 class="heading mb-4">More Initiatives</h3>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach(App\Models\CommunityInitiative::where('status', 'published')
                ->where('id', '!=', $initiative->id)
                ->latest()
                ->take(3)
                ->get() as $relatedInitiative)
                <div class="col">
                    <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                        <img src="{{ asset('storage/' . $relatedInitiative->cover_image) }}" 
                             class="card-img-top" 
                             alt="{{ $relatedInitiative->title }}"
                             style="height: 180px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $relatedInitiative->title }}</h5>
                            <p class="card-text">{{ Str::limit($relatedInitiative->summary, 80) }}</p>
                            <a href="{{ route('initiatives.show', $relatedInitiative->slug) }}" class="btn btn-sm btn-outline-primary">
                                Learn More
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<x-newsletter />
@endsection

@push('styles')
<style>
    .initiative-content img {
        max-width: 100%;
        height: auto;
        border-radius: 0.5rem;
        margin: 1rem 0;
    }
    
    .initiative-content h1, 
    .initiative-content h2, 
    .initiative-content h3, 
    .initiative-content h4, 
    .initiative-content h5, 
    .initiative-content h6 {
        margin-top: 1.5rem;
        margin-bottom: 1rem;
    }
    
    .initiative-content ul, 
    .initiative-content ol {
        margin-bottom: 1rem;
        padding-left: 2rem;
    }
</style>
@endpush