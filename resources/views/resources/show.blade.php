@extends('layouts.app')

@section('content')
<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm rounded-4 border-0">
                    <div class="card-body p-4">
                        <div class="resource-icon mb-4 mx-auto" style="width: 80px; height: 80px;">
                            <i class="{{ $resource->icon_class }}" style="font-size: 2rem;"></i>
                        </div>
                        <h2 class="card-title text-center mb-4">{{ $resource->title }}</h2>
                        <div class="mb-4">
                            <p class="card-text">{{ $resource->description }}</p>
                        </div>
                        <div class="d-grid gap-2">
                            <a href="{{ route('resources.download', $resource) }}" class="btn btn-primary">
                                <i class="bi bi-download me-2"></i>Download PDF
                            </a>
                            <a href="{{ route('resources.index') }}" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left me-2"></i>Back to Resources
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection