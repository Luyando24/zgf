@extends('layouts.app')

@section('title', 'Newsflash')

@section('content')
<section class="py-5 bg-light">
    <div class="container">
        <!-- Header Section -->
        <div class="row mb-5">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="fw-bold mb-3">ZGF Newsflash</h2>
                <div class="d-flex align-items-center justify-content-center mb-3">
                    <i class="bi bi-facebook fs-4 me-2 text-primary"></i>
                    <p class="lead mb-0">Stay connected with our latest activities and announcements</p>
                </div>
                <div class="d-flex justify-content-center">
                    <a href="https://facebook.com/ZambianGovernanceFoundation" target="_blank" class="btn btn-primary rounded-pill px-4">
                        <i class="bi bi-facebook me-2"></i>Follow Us on Facebook
                    </a>
                </div>
            </div>
        </div>

        <!-- Posts Grid -->
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @forelse ($posts as $post)
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                        @if(isset($post['full_picture']))
                            <div class="position-relative">
                                <img src="{{ $post['full_picture'] }}" class="card-img-top" alt="Post Image" style="height: 220px; object-fit: cover;">
                                <div class="position-absolute bottom-0 end-0 p-2">
                                    <span class="badge bg-primary rounded-pill">
                                        <i class="bi bi-facebook me-1"></i>Facebook
                                    </span>
                                </div>
                            </div>
                        @else
                            <div class="card-img-top bg-primary bg-opacity-10 d-flex align-items-center justify-content-center" style="height: 120px;">
                                <i class="bi bi-facebook text-primary" style="font-size: 3rem;"></i>
                            </div>
                        @endif
                        
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="text-muted small">
                                    <i class="bi bi-clock me-1"></i>
                                    {{ \Carbon\Carbon::parse($post['created_time'])->diffForHumans() }}
                                </span>
                            </div>
                            
                            <div class="card-text mb-3" style="max-height: 150px; overflow: hidden;">
                                @if(isset($post['message']))
                                    <p>{{ Str::limit($post['message'], 200) }}</p>
                                @else
                                    <p class="text-muted fst-italic">No message content</p>
                                @endif
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ $post['permalink_url'] }}" class="btn btn-sm btn-outline-primary rounded-pill px-3" target="_blank">
                                    <i class="bi bi-box-arrow-up-right me-1"></i>View Post
                                </a>
                                
                                <div class="d-flex gap-2">
                                    <button class="btn btn-sm btn-light rounded-circle" title="Share">
                                        <i class="bi bi-share"></i>
                                    </button>
                                    <button class="btn btn-sm btn-light rounded-circle" title="Save">
                                        <i class="bi bi-bookmark"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="card border-0 shadow-sm rounded-4 p-5 text-center">
                        <div class="py-5">
                            <i class="bi bi-exclamation-circle text-muted" style="font-size: 3rem;"></i>
                            <h4 class="mt-3">No Posts Available</h4>
                            <p class="text-muted">We couldn't find any Facebook posts at the moment. Please check back later.</p>
                            <a href="{{ url('/') }}" class="btn btn-outline-primary rounded-pill mt-3">
                                <i class="bi bi-house me-2"></i>Return to Homepage
                            </a>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
        
        <!-- Pagination if needed -->
        @if(isset($pagination) && $pagination['next'])
            <div class="d-flex justify-content-center mt-5">
                <a href="{{ url('facebook-posts?page=' . ($pagination['current'] + 1)) }}" class="btn btn-outline-primary rounded-pill px-4">
                    Load More Posts <i class="bi bi-arrow-down-circle ms-2"></i>
                </a>
            </div>
        @endif
    </div>
</section>

<!-- Call to Action Section -->
<section class="py-5 bg-primary bg-opacity-10">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mx-auto text-center">
                <h3 class="mb-3">Stay Connected With ZGF</h3>
                <p class="mb-4">Follow us on all our social media platforms to stay updated with our latest initiatives and community impact.</p>
                <div class="d-flex justify-content-center gap-3">
                    <a href="#" class="btn btn-outline-dark rounded-circle p-2" title="Facebook">
                        <i class="bi bi-facebook fs-5"></i>
                    </a>
                    <a href="#" class="btn btn-outline-dark rounded-circle p-2" title="Twitter">
                        <i class="bi bi-twitter-x fs-5"></i>
                    </a>
                    <a href="#" class="btn btn-outline-dark rounded-circle p-2" title="Instagram">
                        <i class="bi bi-instagram fs-5"></i>
                    </a>
                    <a href="#" class="btn btn-outline-dark rounded-circle p-2" title="LinkedIn">
                        <i class="bi bi-linkedin fs-5"></i>
                    </a>
                    <a href="#" class="btn btn-outline-dark rounded-circle p-2" title="YouTube">
                        <i class="bi bi-youtube fs-5"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<x-newsletter />
@endsection

@push('styles')
<style>
    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
    
    .btn-light {
        background-color: #f8f9fa;
        border-color: #f8f9fa;
    }
    
    .btn-light:hover {
        background-color: #e9ecef;
        border-color: #e9ecef;
    }
</style>
@endpush
