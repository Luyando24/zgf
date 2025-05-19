@extends('layouts.app')

@section('title', 'Thank You for Your Report')

@section('content')
<!-- Hero Section -->
<section class="bg-primary-custom text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="fw-bold mb-3">Thank You for Your Report</h1>
                <p class="lead mb-0">Your contribution helps us create a more just and equitable society.</p>
            </div>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                    <div class="card-body p-5 text-center">
                        <div class="mb-4">
                            <i class="bi bi-check-circle-fill text-success" style="font-size: 5rem;"></i>
                        </div>
                        
                        <h2 class="fw-bold mb-4">Your Report Has Been Submitted</h2>
                        
                        <p class="lead mb-4">
                            We've received your report and appreciate your courage in speaking up.
                        </p>
                        
                        <div class="alert alert-info mb-4">
                            <div class="d-flex">
                                <div class="me-3">
                                    <i class="bi bi-envelope-fill fs-4"></i>
                                </div>
                                <div class="text-start">
                                    <h5 class="alert-heading">What happens next?</h5>
                                    <p class="mb-0">
                                        If you provided contact information, you'll receive a confirmation email with your report details. Our team will review your report and may contact you for additional information if needed.
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <p class="mb-4">
                            Your report reference number: <strong>{{ session('report_reference') ?? 'REF-' . date('Ymd') . '-' . rand(1000, 9999) }}</strong>
                        </p>
                        
                        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center mt-4">
                            <a href="{{ route('home') }}" class="btn btn-primary btn-lg px-4 py-2">Return to Home</a>
                            <a href="{{ route('initiatives.index') }}" class="btn btn-outline-primary btn-lg px-4 py-2">Explore Our Initiatives</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Additional Resources Section -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h3 class="fw-bold mb-4">Need Additional Support?</h3>
                <p class="lead mb-5">
                    If you need immediate assistance or support, please consider reaching out to these resources:
                </p>
                
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card h-100 border-0 shadow-sm rounded-4 hover-card">
                            <div class="card-body p-4">
                                <div class="icon-circle bg-danger text-white mx-auto mb-3">
                                    <i class="bi bi-shield"></i>
                                </div>
                                <h5 class="card-title">Emergency Services</h5>
                                <p class="card-text">For immediate danger or emergencies</p>
                                <p class="fw-bold">Call: 991</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 border-0 shadow-sm rounded-4 hover-card">
                            <div class="card-body p-4">
                                <div class="icon-circle bg-primary text-white mx-auto mb-3">
                                    <i class="bi bi-telephone"></i>
                                </div>
                                <h5 class="card-title">Helplines</h5>
                                <p class="card-text">For guidance and support</p>
                                <p class="fw-bold">Child Helpline: 116</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 border-0 shadow-sm rounded-4 hover-card">
                            <div class="card-body p-4">
                                <div class="icon-circle bg-success text-white mx-auto mb-3">
                                    <i class="bi bi-building"></i>
                                </div>
                                <h5 class="card-title">Legal Aid</h5>
                                <p class="card-text">For legal assistance</p>
                                <p class="fw-bold">Legal Aid Board</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<x-newsletter />
@endsection

@push('styles')
<style>
    /* Primary colors */
    .bg-primary-custom {
        background-color: #4a6baf;
    }
    
    .text-primary-dark {
        color: #3a5a9f;
    }
    
    /* Icons */
    .icon-circle {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
    }
    
    /* Buttons */
    .btn-primary {
        background-color: #4a6baf;
        border-color: #4a6baf;
    }
    
    .btn-primary:hover, .btn-primary:focus {
        background-color: #3a5a9f;
        border-color: #3a5a9f;
    }
    
    .btn-outline-primary {
        color: #4a6baf;
        border-color: #4a6baf;
    }
    
    .btn-outline-primary:hover, .btn-outline-primary:focus {
        background-color: #4a6baf;
        border-color: #4a6baf;
    }
    
    /* Card hover effect */
    .hover-card {
        transition: transform 0.3s ease;
    }
    
    .hover-card:hover {
        transform: translateY(-5px);
    }
</style>
@endpush

@if(session('reference_number'))
    <div class="alert alert-success">
        Your report reference number is: <strong>{{ session('reference_number') }}</strong>
        Please keep this number for future reference.
    </div>
@endif