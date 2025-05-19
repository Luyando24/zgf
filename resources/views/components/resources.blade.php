<div class="resources-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-4">
                <h2 class="heading">Our Resources</h2>
                <p class="text-muted">Download our latest reports and publications</p>
            </div>
        </div>
        
        <div class="row g-4">
            @foreach($resources as $resource)
            <div class="col-md-6 col-lg-4">
                <div class="resource-card">
                    <div class="card shadow-sm rounded-card hover-card">
                        <div class="card-body">
                            <div class="resource-icon mb-3">
                                <i class="{{ $resource->icon }}"></i>
                            </div>
                            <h5 class="card-title">{{ $resource->title }}</h5>
                            <p class="card-text">{{ $resource->description }}</p>
                            <div class="d-flex gap-2">
                                <a href="{{ route('resources.download', $resource) }}" class="btn btn-primary flex-grow-1">
                                    <i class="bi bi-download me-2"></i>Download PDF
                                </a>
                                <a href="{{ route('resources.show', $resource) }}" class="btn btn-outline-primary">
                                    <i class="bi bi-eye"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- All Resources Button -->
        <div class="row mt-5">
            <div class="col-12 text-center">
                <a href="{{ route('resources.index') }}" class="btn primary-button px-4 py-2">
                    <i class="bi bi-folder2-open me-2"></i>All Resources
                </a>
            </div>
        </div>
    </div>
</div>