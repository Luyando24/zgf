<section class="container my-5">
    <div class="row mb-4 align-items-center">
        <div class="col">
            <h4 class="mb-0 heading">News</h4>
        </div>
        <div class="col-auto">
            <h4 class="mb-0 heading"><a href="#" class="text-decoration-none heading">All</a></h4>
        </div>
    </div>

    <div class="row">
        @foreach($featuredPosts as $post)
            <div class="col-md-4 mb-4">
                <a href="{{ route('posts.show', $post->slug) }}" class="text-decoration-none text-dark">
                    <div class="card university-card h-100 shadow-sm border-0">
                        <img src="{{ asset('storage/' . $post->featured_image) }}" class="card-img-top" alt="{{ $post->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ Str::limit(strip_tags($post->content), 100) }}</p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</section>