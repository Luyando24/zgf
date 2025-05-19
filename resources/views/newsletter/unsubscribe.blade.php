@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Unsubscribe from Newsletter</h4>
                </div>
                <div class="card-body">
                    @if(isset($error))
                        <div class="alert alert-danger">
                            {{ $error }}
                        </div>
                    @else
                        <p>Are you sure you want to unsubscribe <strong>{{ $email }}</strong> from our newsletter?</p>
                        <p>You will no longer receive updates from Zambia Governance Foundation.</p>
                        
                        <form action="{{ route('newsletter.confirm-unsubscribe') }}" method="POST">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <button type="submit" class="btn btn-danger">Yes, Unsubscribe Me</button>
                            <a href="{{ url('/') }}" class="btn btn-secondary">Cancel</a>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection