@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Successfully Unsubscribed</h4>
                </div>
                <div class="card-body">
                    <div class="text-center mb-4">
                        <i class="fas fa-check-circle text-success" style="font-size: 48px;"></i>
                    </div>
                    
                    <p>You have successfully unsubscribed <strong>{{ $email }}</strong> from our newsletter.</p>
                    <p>You will no longer receive email updates from Zambia Governance Foundation.</p>
                    <p>If you change your mind, you can always subscribe again from our website.</p>
                    
                    <div class="text-center mt-4">
                        <a href="{{ url('/') }}" class="btn btn-primary">Return to Homepage</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection