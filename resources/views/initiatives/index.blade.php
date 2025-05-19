@extends('layouts.app')

@section('title', 'Community Initiatives')

@section('content')
<section class="container my-5">
    <div class="row mb-4">
        <div class="col-md-8">
            <h2 class="heading">Community Initiatives</h2>
            <p class="text-muted">Explore our community-driven initiatives and discover how you can get involved.</p>
        </div>
    </div>

    <!-- Category Filter -->
    @if($categories->count() > 0)
    <div class="mb-4">
        <div class="d-flex flex-wrap gap-2">
            <a href="{{ route('initiatives.index') }}" class="btn {{ !request('category') ? 'btn-primary' : 'btn-outline-primary' }}">
                All
            </a>
            @foreach($categories as $category)
                <a href="{{ route('initiatives.index', ['category' => $category]) }}" 
                   class="btn {{ request('category') == $category ? 'btn-primary' : 'btn-outline-primary' }}">
                    {{ $category }}
                </a>
            @endforeach
        </div>
    </div>
    @endif

    <!-- Initiatives List -->
    <div class="row g-4">
        @forelse($initiatives as $initiative)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                    <div class="position-relative">
                        <img src="{{ asset('storage/' . $initiative->cover_image) }}" 
                             class="card-img-top" 
                             alt="{{ $initiative->title }}"
                             style="height: 200px; object-fit: cover;">
                        <div class="position-absolute top-0 end-0 m-2">
                            <span class="badge bg-primary rounded-pill">{{ $initiative->category }}</span>
                        </div>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $initiative->title }}</h5>
                        <p class="card-text text-muted small mb-2">
                            <i class="bi bi-geo-alt-fill me-1"></i> {{ $initiative->location }}
                        </p>
                        <p class="card-text text-muted small mb-3">
                            <i class="bi bi-calendar-event me-1"></i> 
                            {{ $initiative->start_date->format('M d, Y') }} - {{ $initiative->end_date->format('M d, Y') }}
                        </p>
                        <p class="card-text flex-grow-1">{{ Str::limit($initiative->summary, 100) }}</p>
                        <div class="mt-auto">
                            <a href="{{ route('initiatives.show', $initiative->slug) }}" class="btn btn-outline-primary">
                                Learn More
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">
                    <p class="mb-0">No initiatives found. Please check back later.</p>
                </div>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-5">
        {{ $initiatives->links() }}
    </div>
</section>

<!-- Call to Action -->
<section class="py-5 bg-primary text-white text-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h2 class="fw-bold mb-4">Want to Start Your Own Initiative?</h2>
                <p class="lead mb-4">We support community-driven projects that create positive change. Get in touch to discuss your ideas.</p>
                <a href="{{ route('contact') }}" class="btn btn-light btn-lg px-4">Contact Us</a>
            </div>
        </div>
    </div>
</section>

<x-newsletter />
@endsection