@extends('layouts.app')

@section('title', $post->meta_title ?? $post->title)

@section('content')
<article class="post-content">
    <!-- Hero Section with Featured Image -->
    @if($post->featured_image)
    <div class="position-relative mb-5">
        <div class="featured-image-container">
            <img 
                src="{{ asset('storage/' . $post->featured_image) }}" 
                alt="{{ $post->title }}" 
                class="w-100 featured-image"
            >
            <div class="featured-image-overlay"></div>
        </div>
    </div>
    @endif

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- Post Header -->
                <header class="post-header mb-5">
                    <h1 class="display-4 fw-bold mb-3">{{ $post->title }}</h1>
                    
                    <div class="post-meta d-flex align-items-center mb-4">
                        <div class="post-date">
                            <i class="bi bi-calendar3 me-2"></i>
                            <time datetime="{{ $post->created_at->format('Y-m-d') }}">
                                {{ $post->created_at->format('F d, Y') }}
                            </time>
                        </div>
                        
                        @if($post->categories && $post->categories->count() > 0)
                        <div class="post-categories ms-4">
                            <i class="bi bi-folder me-2"></i>
                            @foreach($post->categories as $category)
                                <a href="{{ route('category.posts', $category->slug) }}" class="category-link">
                                    {{ $category->name }}
                                </a>
                                @if(!$loop->last), @endif
                            @endforeach
                        </div>
                        @endif
                    </div>
                    
                    @if($post->excerpt)
                    <div class="post-excerpt lead mb-4">
                        {{ $post->excerpt }}
                    </div>
                    @endif
                </header>

                <!-- Post Content -->
                <div class="post-content mb-5">
                    {!! $post->content !!}
                </div>
                
                <!-- Post Footer -->
                <footer class="post-footer">
                    <!-- Social Sharing -->
                    <div class="social-sharing mb-5">
                        <h5 class="mb-3">Share this article</h5>
                        <div class="d-flex gap-2">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" 
                               target="_blank" rel="noopener" class="btn btn-outline-primary" aria-label="Share on Facebook">
                                <i class="bi bi-facebook"></i>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($post->title) }}" 
                               target="_blank" rel="noopener" class="btn btn-outline-primary" aria-label="Share on Twitter">
                                <i class="bi bi-twitter"></i>
                            </a>
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(url()->current()) }}&title={{ urlencode($post->title) }}" 
                               target="_blank" rel="noopener" class="btn btn-outline-primary" aria-label="Share on LinkedIn">
                                <i class="bi bi-linkedin"></i>
                            </a>
                            <a href="mailto:?subject={{ urlencode($post->title) }}&body={{ urlencode(url()->current()) }}" 
                               class="btn btn-outline-primary" aria-label="Share via Email">
                                <i class="bi bi-envelope"></i>
                            </a>
                        </div>
                    </div>
                    
                    <!-- Related Posts -->
                    @if(isset($relatedPosts) && $relatedPosts->count() > 0)
                    <div class="related-posts mt-5">
                        <h3 class="heading mb-4">You might also like</h3>
                        <div class="row row-cols-1 row-cols-md-2 g-4">
                            @foreach($relatedPosts as $relatedPost)
                            <div class="col">
                                <a href="{{ route('post.show', $relatedPost->slug) }}" class="text-decoration-none text-dark">
                                    <div class="card h-100 shadow-sm border-0 rounded-4 university-card">
                                        @if($relatedPost->featured_image)
                                        <img src="{{ asset('storage/' . $relatedPost->featured_image) }}" 
                                             class="card-img-top" alt="{{ $relatedPost->title }}"
                                             style="height: 180px; object-fit: cover;">
                                        @endif
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $relatedPost->title }}</h5>
                                            <p class="card-text">{{ Str::limit(strip_tags($relatedPost->content), 80) }}</p>
                                            <small class="text-muted">{{ $relatedPost->created_at->format('M d, Y') }}</small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    
                    <div class="mt-5">
                        <a href="{{ route('news') }}" class="btn btn-outline-primary">
                            <i class="bi bi-arrow-left me-2"></i>Back to News
                        </a>
                    </div>
                </footer>
            </div>
            
            <!-- Sidebar -->
            <div class="col-lg-4 mt-5 mt-lg-0">
                <div class="sticky-top" style="top: 2rem;">
                    <!-- Newsletter Signup -->
                    <div class="card shadow-sm border-0 rounded-4 mb-4">
                        <div class="card-body p-4">
                            <h4 class="card-title mb-3">Stay Updated</h4>
                            <p class="card-text mb-3">Subscribe to our newsletter for the latest updates and news.</p>
                            <form action="{{ route('newsletter.subscribe') }}" method="POST" class="d-flex flex-column gap-2">
                                @csrf
                                <input type="email" name="email" class="form-control" placeholder="Your email address" required>
                                <button type="submit" class="btn btn-primary">Subscribe</button>
                            </form>
                        </div>
                    </div>
                    
                    <!-- Recent Posts -->
                    <div class="card shadow-sm border-0 rounded-4 mb-4">
                        <div class="card-body p-4">
                            <h4 class="card-title mb-3">Recent Posts</h4>
                            <ul class="list-unstyled">
                                @foreach(App\Models\Post::where('is_published', true)
                                    ->where('id', '!=', $post->id)
                                    ->latest()
                                    ->take(5)
                                    ->get() as $recentPost)
                                <li class="mb-3 pb-3 border-bottom">
                                    <a href="{{ route('post.show', $recentPost->slug) }}" class="text-decoration-none">
                                        <div class="d-flex align-items-center">
                                            @if($recentPost->featured_image)
                                            <div class="flex-shrink-0 me-3">
                                                <img src="{{ asset('storage/' . $recentPost->featured_image) }}" 
                                                     alt="" class="rounded-3" style="width: 60px; height: 60px; object-fit: cover;">
                                            </div>
                                            @endif
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1">{{ Str::limit($recentPost->title, 50) }}</h6>
                                                <small class="text-muted">{{ $recentPost->created_at->format('M d, Y') }}</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>

<x-newsletter />
@endsection

@push('styles')
<style>
    /* Featured Image Styles */
    .featured-image-container {
        position: relative;
        height: 500px;
        overflow: hidden;
    }
    
    .featured-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .featured-image-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(rgba(0,0,0,0.2), rgba(0,0,0,0.4));
    }
    
    /* Post Content Styles */
    .post-content {
        font-size: 1.1rem;
        line-height: 1.8;
    }
    
    .post-content img {
        max-width: 100%;
        height: auto;
        border-radius: 0.5rem;
        margin: 1.5rem 0;
    }
    
    .post-content h2, 
    .post-content h3, 
    .post-content h4 {
        margin-top: 2rem;
        margin-bottom: 1rem;
        font-weight: 700;
    }
    
    .post-content p {
        margin-bottom: 1.5rem;
    }
    
    .post-content blockquote {
        border-left: 4px solid #61A534;
        padding-left: 1.5rem;
        margin-left: 0;
        font-style: italic;
        color: #555;
    }
    
    .post-content ul, 
    .post-content ol {
        margin-bottom: 1.5rem;
        padding-left: 2rem;
    }
    
    .post-content a {
        color: #61A534;
        text-decoration: underline;
    }
    
    .post-content a:hover {
        color: #538F2C;
    }
    
    /* Category Link Styles */
    .category-link {
        color: #61A534;
        text-decoration: none;
    }
    
    .category-link:hover {
        text-decoration: underline;
    }
    
    /* Responsive Adjustments */
    @media (max-width: 767px) {
        .featured-image-container {
            height: 300px;
        }
        
        .post-header h1 {
            font-size: 2rem;
        }
        
        .post-meta {
            flex-direction: column;
            align-items: flex-start;
        }
        
        .post-meta > div {
            margin-bottom: 0.5rem;
        }
        
        .post-meta .ms-4 {
            margin-left: 0 !important;
        }
    }
</style>
@endpush















