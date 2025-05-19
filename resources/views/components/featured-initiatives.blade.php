<section class="py-5 bg-light">
    <div class="container">
        <div class="row mb-4 align-items-center">
            <div class="col">
                <h4 class="mb-0 heading">New Initiatives</h4>
            </div>
            <div class="col-auto">
                <h4 class="mb-0 heading"><a href="{{url('initiatives')}}" class="text-decoration-none heading">All</a></h4>
            </div>
        </div>
    </div>

    <!-- Desktop View (Grid) -->
    <div class="container text-center d-none d-md-block">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($initiatives as $initiative)
            <a href="{{ route('initiatives.show', $initiative->slug) }}" class="text-decoration-none text-dark">
                <div class="col">
                    <div class="card shadow-sm border-0 rounded-4 initiative-card">
                        <div class="image-container">
                            <img src="{{ asset('storage/' . $initiative->cover_image) }}" class="card-img-top" alt="{{ $initiative->title }}">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ Str::limit($initiative->title, 40) }}</h5>
                            <p class="card-text">{{ Str::limit($initiative->summary, 100) }}</p>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>

    <!-- Mobile View (Carousel) -->
    <div class="container d-block d-md-none">
        <div id="initiativesCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($initiatives as $index => $initiative)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                    <a href="{{ route('initiatives.show', $initiative->slug) }}" class="text-decoration-none text-dark">
                        <div class="card shadow-sm border-0 rounded-4 initiative-card mx-2">
                            <div class="image-container">
                                <img src="{{ asset('storage/' . $initiative->cover_image) }}" class="card-img-top" alt="{{ $initiative->title }}">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ Str::limit($initiative->title, 40) }}</h5>
                                <p class="card-text">{{ Str::limit($initiative->summary, 100) }}</p>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            
            <!-- Carousel Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#initiativesCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#initiativesCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            
            <!-- Carousel Indicators -->
            <div class="carousel-indicators">
                @foreach ($initiatives as $index => $initiative)
                <button type="button" data-bs-target="#initiativesCarousel" data-bs-slide-to="{{ $index }}" 
                    class="{{ $index == 0 ? 'active' : '' }}" aria-current="{{ $index == 0 ? 'true' : 'false' }}" 
                    aria-label="Slide {{ $index + 1 }}" style="background-color: #61A534;"></button>
                @endforeach
            </div>
        </div>
    </div>
</section>

<style>
    .image-container {
        height: 200px;
        overflow: hidden;
        border-top-left-radius: 0.5rem;
        border-top-right-radius: 0.5rem;
    }
    
    .image-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }
    
    .initiative-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .initiative-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
    
    .initiative-card:hover .image-container img {
        transform: scale(1.05);
    }
    
    /* Carousel custom styles */
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
        bottom: -40px;
    }
    
    .carousel-indicators button {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        margin: 0 5px;
    }
    
    /* Add some space below the carousel for indicators */
    #initiativesCarousel {
        margin-bottom: 50px;
    }
</style>


