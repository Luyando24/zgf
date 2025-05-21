<section class="py-5 bg-light">
    <div class="container">
        <div class="row mb-4 align-items-center">
            <div class="col">
                <h4 class="mb-0 heading">Newsflash</h4>
            </div>
            <div class="col-auto">
                <h4 class="mb-0 heading"><a href="{{ route('facebook-posts') }}" class="text-decoration-none heading">All</a></h4>
            </div>
        </div>

        <div class="row g-4">
            @forelse ($posts as $post)
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm rounded-4 facebook-card">
                        <!-- Card Header with Facebook Logo -->
                        <div class="card-header bg-transparent border-0 pt-3 pb-0">
                            <div class="d-flex align-items-center">
                                <div class="facebook-icon-bg rounded-circle me-2">
                                    <i class="bi bi-facebook text-white"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0 fw-bold">ZGF</h6>
                                    <small class="text-muted">{{ \Carbon\Carbon::parse($post['created_time'])->diffForHumans() }}</small>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Card Body -->
                        <div class="card-body">
                            <!-- Post Content -->
                            <div class="post-content mb-3">
                                @if(isset($post['message']))
                                    <p class="mb-0">{{ Str::limit($post['message'], 120) }}</p>
                                @else
                                    <p class="text-muted fst-italic mb-0">No message content</p>
                                @endif
                            </div>
                            
                            <!-- Post Image if available -->
                            @if(isset($post['full_picture']))
                                <div class="post-image mb-3">
                                    <img src="{{ $post['full_picture'] }}" class="img-fluid rounded-3" alt="Post Image">
                                </div>
                            @endif
                            
                            <!-- Post Stats -->
                            <div class="post-stats d-flex align-items-center justify-content-between text-muted small">
                                @if(isset($post['likes']) && isset($post['likes']['summary']) && isset($post['likes']['summary']['total_count']))
                                    <span>
                                        <i class="bi bi-heart-fill text-danger me-1"></i>
                                        {{ $post['likes']['summary']['total_count'] }}
                                    </span>
                                @else
                                    <span></span>
                                @endif
                                
                                @if(isset($post['comments']) && isset($post['comments']['summary']) && isset($post['comments']['summary']['total_count']))
                                    <span>
                                        <i class="bi bi-chat-fill text-primary me-1"></i>
                                        {{ $post['comments']['summary']['total_count'] }}
                                    </span>
                                @endif
                                
                                @if(isset($post['shares']) && isset($post['shares']['count']))
                                    <span>
                                        <i class="bi bi-share-fill text-success me-1"></i>
                                        {{ $post['shares']['count'] }}
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <!-- Card Footer -->
                        <div class="card-footer bg-transparent border-0 pt-0">
                            <a href="{{ $post['permalink_url'] }}" class="btn btn-sm btn-outline-primary rounded-pill w-100" target="_blank">
                                <i class="bi bi-facebook me-1"></i>View on Facebook
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <div class="py-4">
                        <i class="bi bi-facebook text-primary" style="font-size: 2rem;"></i>
                        <p class="mt-3 text-muted">No recent Facebook posts available</p>
                        <a href="https://facebook.com/ZambianGovernanceFoundation" target="_blank" class="btn btn-sm btn-primary rounded-pill">
                            <i class="bi bi-facebook me-1"></i>Visit Our Facebook Page
                        </a>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>

<style>
    .facebook-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        overflow: hidden;
    }
    
    .facebook-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
    
    .facebook-icon-bg {
        width: 32px;
        height: 32px;
        background-color: #1877F2;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .post-content {
        font-size: 0.9rem;
        max-height: 80px;
        overflow: hidden;
    }
    
    .post-image {
        max-height: 180px;
        overflow: hidden;
    }
    
    .post-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .card-footer {
        padding-bottom: 1rem;
    }
</style>