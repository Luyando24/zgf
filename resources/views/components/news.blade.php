<section class="container my-5">
    <div class="row mb-4 align-items-center">
        <div class="col">
            <h4 class="mb-0 heading">News</h4>
        </div>
        <div class="col-auto">
            <h4 class="mb-0 heading"><a href="{{ route('posts.index') }}" class="text-decoration-none heading">All</a></h4>
        </div>
    </div>

    <!-- Desktop View (Grid) -->
    <div class="row d-none d-md-flex">
        @foreach($featuredPosts as $post)
            <div class="col-md-4 mb-4">
                <a href="{{ route('posts.show', $post->slug) }}" class="text-decoration-none text-dark">
                    <div class="card university-card h-100 shadow-sm border-0 rounded-4">
                        <img src="{{ asset('storage/' . $post->featured_image) }}" class="card-img-top" alt="{{ $post->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ Str::limit(strip_tags($post->content), 100) }}</p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>

    <!-- News Carousel for Mobile -->
    <div class="d-block d-md-none">
        <div id="newsCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach($featuredPosts as $index => $post)
                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                        <div class="row justify-content-center">
                            <div class="col-md-8 col-lg-6">
                                <a href="{{ route('posts.show', $post->slug) }}" class="text-decoration-none text-dark">
                                    <div class="card university-card h-100 shadow-sm border-0 rounded-4">
                                        <img src="{{ asset('storage/' . $post->featured_image) }}" class="card-img-top" alt="{{ $post->title }}">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $post->title }}</h5>
                                            <p class="card-text">{{ Str::limit(strip_tags($post->content), 100) }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <!-- Carousel Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#newsCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#newsCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            
            <!-- Carousel Indicators -->
            <div class="carousel-indicators">
                @foreach($featuredPosts as $index => $post)
                    <button type="button" data-bs-target="#newsCarousel" data-bs-slide-to="{{ $index }}" 
                        class="{{ $index == 0 ? 'active' : '' }}" aria-current="{{ $index == 0 ? 'true' : 'false' }}" 
                        aria-label="Slide {{ $index + 1 }}"></button>
                @endforeach
            </div>
        </div>
    </div>
</section>

<style>
    /* Carousel custom styles */
    #newsCarousel {
        margin-bottom: 30px;
    }
    
    #newsCarousel .carousel-item {
        padding: 20px 10px;
    }
    
    #newsCarousel .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    #newsCarousel .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
    
    #newsCarousel .card-img-top {
        height: 220px;
        object-fit: cover;
        border-top-left-radius: 0.5rem;
        border-top-right-radius: 0.5rem;
    }
    
    .carousel-control-prev,
    .carousel-control-next {
        width: 10%;
        opacity: 0.8;
    }
    
    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        background-color: rgba(97, 165, 52, 0.7);
        border-radius: 50%;
        padding: 10px;
    }
    
    .carousel-indicators {
        bottom: -30px;
    }
    
    .carousel-indicators button {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        margin: 0 5px;
        background-color: #61A534;
    }
</style>


