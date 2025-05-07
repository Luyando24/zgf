@extends('layouts.app')

@section('title', $post->title)

@section('content')
<section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">

                <div class="card border-0 shadow-sm rounded-4">
                    @if($post->featured_image)
                        <img src="{{ asset('storage/' . $post->featured_image) }}" class="card-img-top" alt="{{ $post->title }}" style="height: 300px">
                    @endif

                    <div class="card-body">
                        <h2 class="card-title">{{ $post->title }}</h2>
                        <p class="text-muted mb-3">{{ $post->created_at->format('F d, Y') }}</p>

                        <div class="card-text">
                            {!!($post->content) !!}
                        </div>

                        <div class="mt-4">
                            <a href="{{ route('news') }}" class="btn btn-outline-secondary">← Back to News</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
