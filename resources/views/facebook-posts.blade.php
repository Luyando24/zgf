@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Facebook Page Posts</h2>
    <div class="row">
        @forelse ($posts as $post)
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    @if(isset($post['full_picture']))
                        <img src="{{ $post['full_picture'] }}" class="card-img-top" alt="Post Image">
                    @endif
                    <div class="card-body">
                        <p class="card-text">{{ $post['message'] ?? 'No message' }}</p>
                        <a href="{{ $post['permalink_url'] }}" class="btn btn-primary" target="_blank">View on Facebook</a>
                    </div>
                    <div class="card-footer text-muted">
                        {{ \Carbon\Carbon::parse($post['created_time'])->diffForHumans() }}
                    </div>
                </div>
            </div>
        @empty
            <p>No posts available.</p>
        @endforelse
    </div>
</div>
@endsection
