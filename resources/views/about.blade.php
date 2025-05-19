@extends('layouts.app')

@section('title', 'About Us')

@section('content')
<section class="container my-5">

    <!-- Page Heading -->
    <div class="text-center mb-5">
        <h2 class="display-5 fw-bold heading">About ZGF</h2>
        <p class="text-muted mx-auto" style="max-width: 700px;">
            Empowering civil society. Strengthening governance. Building a just Zambia.
        </p>
    </div>

    <!-- Intro Section -->
    <div class="row align-items-center mb-5">
        <div class="col-lg-6 mb-4">
            <img src="{{ asset('images/about2.jpg') }}" class="img-fluid rounded-4 shadow-sm" alt="ZGF Work">
        </div>
        <div class="col-lg-6">
            <p class="text-muted fs-5">
                The Zambian Governance Foundation (ZGF) supports local civil society organizations to deliver impactful solutions within their communities. We believe in local leadership, citizen participation, and development that is inclusive and sustainable.
            </p>
        </div>
    </div>

    <!-- Mission & Vision Section -->
    <div class="row text-center mb-5">
        <div class="col-md-6 mb-4">
            <div class="p-4 border rounded-4 shadow-sm bg-white h-100">
                <h4 class="mb-3">Our Mission</h4>
                <p class="text-muted">
                    To empower civil society organizations with funding, knowledge, and platforms that amplify citizen voices and foster democratic governance in Zambia.
                </p>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="p-4 border rounded-4 shadow-sm bg-white h-100">
                <h4 class="mb-3">Our Vision</h4>
                <p class="text-muted">
                    A Zambia where all citizens are actively engaged in shaping a fair, just, and equitable society.
                </p>
            </div>
        </div>
    </div>

    <!-- Core Values as Cards -->
    <div class="mb-5">
        <h4 class="mb-4 text-center">Our Core Values</h4>
        <div class="row g-4">
            @php
                $values = [
                    ['title' => 'Participation', 'desc' => 'We promote inclusive civic engagement and amplify marginalized voices.'],
                    ['title' => 'Partnership', 'desc' => 'We value strong, respectful collaborations with local CSOs and stakeholders.'],
                    ['title' => 'Transparency', 'desc' => 'We uphold accountability and integrity in all our operations.'],
                    ['title' => 'Innovation', 'desc' => 'We embrace new approaches that advance sustainable development goals.'],
                ];
            @endphp

            @foreach ($values as $value)
                <div class="col-md-6 col-lg-3">
                    <div class="p-4 rounded-4 text-center bg-white shadow-lg position-relative" style="box-shadow: 0 8px 20px rgba(62, 162, 164, 0.25);">
                        <h5 class="mb-2">{{ $value['title'] }}</h5>
                        <p class="text-muted small">{{ $value['desc'] }}</p>
                        <div class="position-absolute top-0 start-0 w-100 h-100" style="z-index: -1; filter: blur(30px); background-color: rgba(62, 162, 164, 0.2); border-radius: 1rem;"></div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- History Section -->
    <div class="row mb-5">
        <div class="col-12">
            <h4 class="mb-3">Our Journey</h4>
            <p class="text-muted fs-5">
                Since our founding in 2009, ZGF has evolved into a key enabler for Zambia’s civil society. Through capacity development, grant-making, and learning platforms, we’ve partnered with over 300 organizations to advance rights-based, citizen-led development across the country.
            </p>
        </div>
    </div>

    <!-- Team Section -->
    <div class="mb-5">
        <h3 class="mb-4 text-center">Our Team</h3>
        <p class="text-center text-muted mx-auto mb-5" style="max-width: 700px;">
            Our dedicated team of professionals brings diverse expertise and a shared commitment to strengthening civil society in Zambia.
        </p>
        
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
            <!-- Team Member 1 -->
            <div class="col">
                <div class="card border-0 shadow-sm rounded-4 h-100 text-center">
                    <div class="position-relative">
                        <img src="{{ asset('images/team1.jpg') }}" class="card-img-top rounded-top-4" alt="Team Member" onerror="this.src='{{ asset('images/placeholder-person.jpg') }}'">
                        <div class="team-social position-absolute w-100 d-flex justify-content-center gap-2" style="bottom: 10px;">
                            <a href="#" class="btn btn-sm btn-light rounded-circle"><i class="bi bi-linkedin"></i></a>
                            <a href="#" class="btn btn-sm btn-light rounded-circle"><i class="bi bi-twitter-x"></i></a>
                            <a href="#" class="btn btn-sm btn-light rounded-circle"><i class="bi bi-envelope-fill"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title mb-1">John Mwanza</h5>
                        <p class="text-muted small mb-2">Program Director</p>
                        <p class="card-text small">Overseeing program implementation and ensuring effective delivery of ZGF initiatives.</p>
                    </div>
                </div>
            </div>
            
            <!-- Team Member 2 -->
            <div class="col">
                <div class="card border-0 shadow-sm rounded-4 h-100 text-center">
                    <div class="position-relative">
                        <img src="{{ asset('images/team1.jpg') }}" class="card-img-top rounded-top-4" alt="Team Member" onerror="this.src='{{ asset('images/placeholder-person.jpg') }}'">
                        <div class="team-social position-absolute w-100 d-flex justify-content-center gap-2" style="bottom: 10px;">
                            <a href="#" class="btn btn-sm btn-light rounded-circle"><i class="bi bi-linkedin"></i></a>
                            <a href="#" class="btn btn-sm btn-light rounded-circle"><i class="bi bi-twitter-x"></i></a>
                            <a href="#" class="btn btn-sm btn-light rounded-circle"><i class="bi bi-envelope-fill"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title mb-1">Sarah Banda</h5>
                        <p class="text-muted small mb-2">Operations Manager</p>
                        <p class="card-text small">Managing day-to-day operations and organizational effectiveness.</p>
                    </div>
                </div>
            </div>
            
            <!-- Team Member 3 -->
            <div class="col">
                <div class="card border-0 shadow-sm rounded-4 h-100 text-center">
                    <div class="position-relative">
                        <img src="{{ asset('images/team1.jpg') }}" class="card-img-top rounded-top-4" alt="Team Member" onerror="this.src='{{ asset('images/placeholder-person.jpg') }}'">
                        <div class="team-social position-absolute w-100 d-flex justify-content-center gap-2" style="bottom: 10px;">
                            <a href="#" class="btn btn-sm btn-light rounded-circle"><i class="bi bi-linkedin"></i></a>
                            <a href="#" class="btn btn-sm btn-light rounded-circle"><i class="bi bi-twitter-x"></i></a>
                            <a href="#" class="btn btn-sm btn-light rounded-circle"><i class="bi bi-envelope-fill"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title mb-1">David Tembo</h5>
                        <p class="text-muted small mb-2">Partnerships Lead</p>
                        <p class="card-text small">Building and maintaining strategic relationships with stakeholders.</p>
                    </div>
                </div>
            </div>
            
            <!-- Team Member 4 -->
            <div class="col">
                <div class="card border-0 shadow-sm rounded-4 h-100 text-center">
                    <div class="position-relative">
                        <img src="{{ asset('images/team1.jpg') }}" class="card-img-top rounded-top-4" alt="Team Member" onerror="this.src='{{ asset('images/placeholder-person.jpg') }}'">
                        <div class="team-social position-absolute w-100 d-flex justify-content-center gap-2" style="bottom: 10px;">
                            <a href="#" class="btn btn-sm btn-light rounded-circle"><i class="bi bi-linkedin"></i></a>
                            <a href="#" class="btn btn-sm btn-light rounded-circle"><i class="bi bi-twitter-x"></i></a>
                            <a href="#" class="btn btn-sm btn-light rounded-circle"><i class="bi bi-envelope-fill"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title mb-1">Grace Mutale</h5>
                        <p class="text-muted small mb-2">Program Officer</p>
                        <p class="card-text small">Coordinating capacity building and grant management initiatives.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action Section -->
<section class="py-5 bg-primary-custom text-white text-center mx-0">
    <div class="container-fluid px-0">
        <div class="row justify-content-center mx-0">
            <div class="col-lg-8">
                <h2 class="fw-bold mb-4">Ready to Make a Difference?</h2>
                <p class="lead mb-4">Join us in our mission to strengthen civil society and promote good governance across Zambia. Together, we can create lasting positive change.</p>
                <div class="d-flex flex-wrap justify-content-center gap-3">
                    <a href="{{ route('partnership-request') }}" class="btn btn-light btn-lg px-4">Partner With Us</a>
                    <a href="{{ route('volunteer') }}" class="btn btn-outline-light btn-lg px-4">Volunteer</a>
                    <a href="{{ route('contact') }}" class="btn btn-outline-light btn-lg px-4">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</section>

<x-newsletter class="mx-0" />
@endsection

