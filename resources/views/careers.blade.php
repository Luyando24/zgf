@extends('layouts.app')

@section('title', 'Careers at ZGF')

@section('content')
<section class="container my-5">
  <div class="text-center mb-5">
    <h2 class="fw-bold">Join Our Team</h2>
    <p class="text-muted">Explore open positions at the Zambian Governance Foundation</p>
  </div>

  <!-- Filter Card -->
  <div class="card border-0 shadow-sm rounded-4 mb-5">
    <div class="card-body">
      <form method="GET" action="{{ route('careers') }}" class="row g-3 align-items-end">
        <div class="col-md-4">
          <label class="form-label fw-semibold">Job Title</label>
          <input type="text" name="title" value="{{ request('title') }}" class="form-control" placeholder="e.g. Programme Officer">
        </div>
        <div class="col-md-3">
          <label class="form-label fw-semibold">Category</label>
          <select name="category" class="form-select">
            <option value="">All Categories</option>
            <option value="Engineering" {{ request('category') == 'Engineering' ? 'selected' : '' }}>Engineering</option>
            <option value="Marketing" {{ request('category') == 'Marketing' ? 'selected' : '' }}>Marketing</option>
            <option value="Finance" {{ request('category') == 'Finance' ? 'selected' : '' }}>Finance</option>
            <option value="HR" {{ request('category') == 'HR' ? 'selected' : '' }}>HR</option>
            <option value="IT" {{ request('category') == 'IT' ? 'selected' : '' }}>IT</option>
          </select>
        </div>
        <div class="col-md-3">
          <label class="form-label fw-semibold">Location</label>
          <input type="text" name="location" value="{{ request('location') }}" class="form-control" placeholder="e.g. Lusaka">
        </div>
        <div class="col-md-2">
          <button type="submit" class="btn btn-primary w-100" style="background-color: #61A534; border-color: #61A534">
            <i class="bi bi-search"></i> Filter
          </button>
        </div>
      </form>
    </div>
  </div>

  @if($jobs->count())
    <div class="row g-4">
      @foreach($jobs as $job)
        <div class="col-md-6 col-lg-6">
          <div class="card shadow-sm h-100 border-0 rounded-4">
            <div class="card-body d-flex flex-column justify-content-between">
              <div>
                <h5 class="card-title fw-bold heading">{{ $job->title }}</h5>
                <div class="mb-2">
                  <span class="badge rounded-pill" style="background: #61A534">{{ $job->type }}</span>
                  <span class="badge bg-light text-dark border">{{ $job->category }}</span>
                </div>
                <p class="text-muted small">
                  {{ Str::limit(strip_tags($job->description), 120, '...') }}
                </p>
              </div>

              <div class="d-flex justify-content-between align-items-center mt-3">
                <small class="text-muted"><strong>Location:</strong> {{ $job->location ?? 'Zambia' }}</small>
                <a href="{{ route('job.show', $job->slug) }}" class="btn btn-sm btn-outline-success px-3" style="border: 2px solid #61A534">
                  View Details & Apply
                </a>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>

    <div class="mt-5 d-flex justify-content-center">
      {{ $jobs->links() }}
    </div>
  @else
    <div class="text-center mt-5">
      <p class="text-muted fs-5">There are currently no open positions. Please check back later.</p>
    </div>
  @endif
</section>

<x-newsletter />
@endsection
