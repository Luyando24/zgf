@extends('layouts.app')

@section('title', 'Latest News')

@section('content')
<section class="py-5 bg-light">
    <div class="container">
        <div class="row mb-5 align-items-center">
            <div class="col">
                <h1 class="display-4 fw-bold heading">Latest News & Updates</h1>
                <p class="lead text-muted">Stay informed with the latest news, insights, and updates from Zambian Governance Foundation.</p>
            </div>
        </div>

        <div class="row g-4">
            @forelse ($posts as $post)
                <div class="col-md-6 col-lg-4">
                    <a href="{{ route('posts.show', $post->slug) }}" class="text-decoration-none text-dark">
                        <div class="card shadow-sm border-0 rounded-4 h-100 news-card">
                            @if($post->featured_image)
                                <div class="card-img-container">
                                    <img src="{{ asset('storage/' . $post->featured_image) }}" 
                                         class="card-img-top" 
                                         alt="{{ $post->title }}">
                                </div>
                            @endif
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-2">
                                    <small class="text-muted">
                                        <i class="bi bi-calendar3 me-1"></i>
                                        {{ $post->created_at->format('F d, Y') }}
                                    </small>
                                    
                                    @if($post->categories && $post->categories->count() > 0)
                                        <small class="ms-3">
                                            <i class="bi bi-folder me-1"></i>
                                            {{ $post->categories->first()->name }}
                                        </small>
                                    @endif
                                </div>
                                
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p class="card-text">{{ Str::limit($post->excerpt ?? strip_tags($post->content), 120) }}</p>
                                
                                <div class="mt-auto">
                                    <span class="text-primary">Read more <i class="bi bi-arrow-right"></i></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <div class="empty-state">
                        <i class="bi bi-newspaper display-1 text-muted mb-3"></i>
                        <h3>No news available</h3>
                        <p class="text-muted">Check back soon for the latest updates and news.</p>
                    </div>
                </div>
            @endforelse
        </div>

        <div class="mt-5 d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>
</section>

<x-newsletter />
@endsection

@push('styles')
<style>
    .news-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .news-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
    
    .card-img-container {
        height: 200px;
        overflow: hidden;
        border-top-left-radius: 0.5rem;
        border-top-right-radius: 0.5rem;
    }
    
    .card-img-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    
    .news-card:hover .card-img-container img {
        transform: scale(1.05);
    }
    
    .empty-state {
        padding: 3rem;
        background-color: #f8f9fa;
        border-radius: 1rem;
    }
    
    /* Pagination Styling */
    .pagination {
        gap: 0.5rem;
    }
    
    .page-item .page-link {
        border-radius: 0.5rem;
        border: none;
        color: #333;
        padding: 0.5rem 1rem;
    }
    
    .page-item.active .page-link {
        background-color: #61A534;
        color: white;
    }
    
    .page-item .page-link:hover {
        background-color: #e9ecef;
    }
    
    .page-item.disabled .page-link {
        color: #6c757d;
        background-color: transparent;
    }
</style>
@endpush










