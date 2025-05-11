@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-5">
                    <div class="mb-4">
                        <i class="bi bi-check-circle-fill text-success" style="font-size: 4rem;"></i>
                    </div>
                    <h1 class="fw-bold mb-4">Thank You for Volunteering!</h1>
                    <p class="lead mb-4">
                        We've received your volunteer application and appreciate your interest in supporting our mission.
                    </p>
                    <p class="mb-4">
                        Our team will review your information and get back to you soon about the next steps. 
                        In the meantime, feel free to explore more about our programs and initiatives.
                    </p>
                    <div class="mt-5">
                        <a href="{{ route('home') }}" class="btn btn-primary" style="background-color: #61A534; border-color: #61A534;">Return to Homepage</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection