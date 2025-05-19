@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-5 text-center">
                    <div class="mb-4">
                        <div class="bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="bi bi-check-lg fs-1"></i>
                        </div>
                        <h1 class="fw-bold text-success">Thank You!</h1>
                        <p class="lead">Your donation has been successfully processed.</p>
                    </div>
                    
                    @if(isset($transaction))
                    <div class="bg-light p-4 rounded-3 mb-4 text-start">
                        <h5 class="fw-bold mb-3">Transaction Details</h5>
                        <p class="mb-2"><strong>Amount:</strong> {{ $transaction->currency }} {{ number_format($transaction->amount, 2) }}</p>
                        <p class="mb-2"><strong>Transaction ID:</strong> {{ $transaction->tx_ref }}</p>
                        <p class="mb-2"><strong>Payment Method:</strong> {{ ucfirst($transaction->payment_type) }}</p>
                        <p class="mb-0"><strong>Date:</strong> {{ \Carbon\Carbon::parse($transaction->created_at)->format('F d, Y, h:i A') }}</p>
                    </div>
                    @endif
                    
                    <p class="mb-4">Your generosity helps us strengthen civil society and empower communities across Zambia. We've sent a receipt to your email address.</p>
                    
                    <div class="d-flex flex-column flex-md-row justify-content-center gap-3">
                        <a href="{{ route('home') }}" class="btn btn-primary px-4">Return to Homepage</a>
                        <a href="{{ route('impact') }}" class="btn btn-outline-primary px-4">See Your Impact</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <h2 class="fw-bold mb-4">Share Your Support</h2>
                <p class="mb-4">Help us spread the word about our mission by sharing on social media.</p>
                
                <div class="d-flex justify-content-center gap-3">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('donate')) }}" target="_blank" class="social-icon">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="https://twitter.com/intent/tweet?text=I%20just%20supported%20Zambian%20Governance%20Foundation.%20Join%20me%20in%20strengthening%20civil%20society!&url={{ urlencode(route('donate')) }}" target="_blank" class="social-icon">
                        <i class="bi bi-twitter-x"></i>
                    </a>
                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(route('donate')) }}" target="_blank" class="social-icon">
                        <i class="bi bi-linkedin"></i>
                    </a>
                    <a href="mailto:?subject=Support%20Zambian%20Governance%20Foundation&body=I%20just%20made%20a%20donation%20to%20support%20community%20development%20in%20Zambia.%20Learn%20more%20at%20{{ urlencode(route('donate')) }}" class="social-icon">
                        <i class="bi bi-envelope"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection