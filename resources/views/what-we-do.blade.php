@extends('layouts.app')

@section('title', 'What We Do')

@section('content')
<section class="container my-5">
    <h2 class="mb-4 text-center heading">What We Do</h2>

    <!-- Key Features Section -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                <!-- Feature Card 1 -->
                <div class="col">
                    <div class="card shadow-sm rounded-4 border-0 text-center">
                        <img src="{{ asset('images/feature1.webp') }}" class="card-img-top" alt="Feature 1" style="object-fit: cover; height: 200px;">
                        <div class="card-body">
                            <h5 class="card-title">Capacity Building</h5>
                            <p class="text-muted">We empower local organizations through training, coaching, and technical support to strengthen civil society.</p>
                        </div>
                    </div>
                </div>

                <!-- Feature Card 2 -->
                <div class="col">
                    <div class="card shadow-sm rounded-4 border-0 text-center">
                        <img src="{{ asset('images/feature2.png') }}" class="card-img-top" alt="Feature 2" style="object-fit: cover; height: 200px;">
                        <div class="card-body">
                            <h5 class="card-title">Grant Management</h5>
                            <p class="text-muted">We provide tailored funding to local organizations and ensure responsible grant administration and reporting.</p>
                        </div>
                    </div>
                </div>

                <!-- Feature Card 3 -->
                <div class="col">
                    <div class="card shadow-sm rounded-4 border-0 text-center">
                        <img src="{{ asset('images/feature3.webp') }}" class="card-img-top" alt="Feature 3" style="object-fit: cover; height: 200px;">
                        <div class="card-body">
                            <h5 class="card-title">Advocacy Support</h5>
                            <p class="text-muted">We help civil society amplify their voice and engage in dialogue to influence governance and policy reforms.</p>
                        </div>
                    </div>
                </div>

                <!-- Feature Card 4 (duplicate placeholder) -->
                <div class="col">
                    <div class="card shadow-sm rounded-4 border-0 text-center">
                        <img src="{{ asset('images/feature1.webp') }}" class="card-img-top" alt="Feature 4" style="object-fit: cover; height: 200px;">
                        <div class="card-body">
                            <h5 class="card-title">Local Fundraising</h5>
                            <p class="text-muted">We build the fundraising capacity of local NGOs to diversify income and reduce donor dependency.</p>
                        </div>
                    </div>
                </div>

                <!-- Feature Card 5 (duplicate placeholder) -->
                <div class="col">
                    <div class="card shadow-sm rounded-4 border-0 text-center">
                        <img src="{{ asset('images/feature2.png') }}" class="card-img-top" alt="Feature 5" style="object-fit: cover; height: 200px;">
                        <div class="card-body">
                            <h5 class="card-title">Knowledge Sharing</h5>
                            <p class="text-muted">We promote peer learning through workshops, forums, and regional exchanges among civil society actors.</p>
                        </div>
                    </div>
                </div>

                <!-- Feature Card 6 (duplicate placeholder) -->
                <div class="col">
                    <div class="card shadow-sm rounded-4 border-0 text-center">
                        <img src="{{ asset('images/feature3.webp') }}" class="card-img-top" alt="Feature 6" style="object-fit: cover; height: 200px;">
                        <div class="card-body">
                            <h5 class="card-title">Partnership Building</h5>
                            <p class="text-muted">We connect grassroots organizations with funders, government, and private sector stakeholders.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <p class="text-center text-muted mx-auto mb-5" style="max-width: 700px;">
        At the Zambian Governance Foundation (ZGF), we strengthen local civil society by providing resources, partnerships, and capacity-building support to drive positive change in communities across Zambia.
    </p>
    <div class="text-center mb-5">
        <a href="{{ route('contact') }}" class="btn primary-button px-4 py-2 rounded-pill">Partner With Us</a>
    </div>
</section>

<!-- Our Partners Section -->
<section class="bg-light py-5">
    <div class="container">
        <h2 class="mb-4 text-center heading">Our Partners</h2>
        <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 g-4 justify-content-center">
            @php
                $partners = [
                    ['name' => 'Civil Society Network', 'image' => 'feature1.webp'],
                    ['name' => 'Zambia NGOs Forum', 'image' => 'feature2.png'],
                    ['name' => 'Community Action Group', 'image' => 'feature3.webp'],
                    ['name' => 'Regional Governance Trust', 'image' => 'feature1.webp'],
                    ['name' => 'Fund for Democracy', 'image' => 'feature2.png'],
                    ['name' => 'Voice of the People', 'image' => 'feature3.webp'],
                ];
            @endphp

            @foreach ($partners as $partner)
                <div class="col text-center">
                    <div class="card shadow-sm border-0 rounded-4 h-100">
                        <div class="card-body d-flex flex-column align-items-center justify-content-center">
                            <img src="{{ asset('images/' . $partner['image']) }}" alt="{{ $partner['name'] }}" class="mb-3" style="width: 80px; height: 80px; object-fit: contain;">
                            <h6 class="text-muted mb-0">{{ $partner['name'] }}</h6>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<x-newsletter />
@endsection
