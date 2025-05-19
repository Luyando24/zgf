@extends('layouts.app')

@section('title', 'How We Do It')

@section('content')
<section class="container my-5">
    <h2 class="mb-4 text-center heading">How We Do It</h2>
    <p class="text-center text-muted mx-auto mb-5" style="max-width: 700px;">
        The Zambian Governance Foundation (ZGF) employs proven methodologies and strategic approaches to strengthen civil society and drive sustainable community development across Zambia.
    </p>

    <!-- Our Approach Section -->
    <div class="row mb-5">
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm rounded-4 border-0 h-100">
                <div class="card-body p-4">
                    <h4 class="card-title mb-3">Our Methodology</h4>
                    <p>We employ a participatory approach that centers community voices and local expertise. Our work is guided by these principles:</p>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Community-led initiatives</li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Sustainable development practices</li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Inclusive decision-making</li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Transparent resource allocation</li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Evidence-based programming</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm rounded-4 border-0 h-100">
                <div class="card-body p-4">
                    <h4 class="card-title mb-3">Our Process</h4>
                    <div class="d-flex mb-3">
                        <div class="me-3">
                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">1</div>
                        </div>
                        <div>
                            <h5>Assessment & Engagement</h5>
                            <p class="text-muted">We identify community needs and engage local stakeholders to understand priorities.</p>
                        </div>
                    </div>
                    <div class="d-flex mb-3">
                        <div class="me-3">
                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">2</div>
                        </div>
                        <div>
                            <h5>Capacity Building</h5>
                            <p class="text-muted">We provide training, resources, and technical support to local organizations.</p>
                        </div>
                    </div>
                    <div class="d-flex mb-3">
                        <div class="me-3">
                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">3</div>
                        </div>
                        <div>
                            <h5>Implementation & Support</h5>
                            <p class="text-muted">We facilitate project implementation with ongoing mentorship and resources.</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="me-3">
                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">4</div>
                        </div>
                        <div>
                            <h5>Monitoring & Sustainability</h5>
                            <p class="text-muted">We evaluate impact and develop sustainability plans for long-term success.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Key Strategies Section -->
    <h3 class="mb-4 text-center">Our Key Strategies</h3>
    <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
        <!-- Strategy 1 -->
        <div class="col">
            <div class="card shadow-sm rounded-4 border-0 h-100">
                <div class="card-body p-4">
                    <div class="icon-circle mb-3">
                        <i class="bi bi-people-fill fs-3"></i>
                    </div>
                    <h5 class="card-title">Collaborative Partnerships</h5>
                    <p class="text-muted">We build strategic alliances between civil society, government, and private sector to maximize impact and resources.</p>
                </div>
            </div>
        </div>
        
        <!-- Strategy 2 -->
        <div class="col">
            <div class="card shadow-sm rounded-4 border-0 h-100">
                <div class="card-body p-4">
                    <div class="icon-circle mb-3">
                        <i class="bi bi-graph-up-arrow fs-3"></i>
                    </div>
                    <h5 class="card-title">Knowledge Management</h5>
                    <p class="text-muted">We document best practices, facilitate learning exchanges, and promote evidence-based approaches.</p>
                </div>
            </div>
        </div>
        
        <!-- Strategy 3 -->
        <div class="col">
            <div class="card shadow-sm rounded-4 border-0 h-100">
                <div class="card-body p-4">
                    <div class="icon-circle mb-3">
                        <i class="bi bi-gear-fill fs-3"></i>
                    </div>
                    <h5 class="card-title">Adaptive Management</h5>
                    <p class="text-muted">We employ flexible approaches that respond to changing contexts and emerging opportunities.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center mb-5">
        <a href="{{ route('contact') }}" class="btn primary-button px-4 py-2 rounded-pill">Partner With Us</a>
    </div>
</section>

<!-- Success Stories Section -->
<section class="bg-light py-5">
    <div class="container">
        <h2 class="mb-4 text-center heading">Success Stories</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card shadow-sm border-0 rounded-4 h-100">
                    <div class="card-body p-4">
                        <h5 class="card-title">Community Health Initiative</h5>
                        <p class="text-muted">Partnered with local health organizations to improve access to healthcare in rural communities, resulting in a 30% increase in service utilization.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm border-0 rounded-4 h-100">
                    <div class="card-body p-4">
                        <h5 class="card-title">Youth Leadership Program</h5>
                        <p class="text-muted">Trained over 200 young leaders who have gone on to implement community projects reaching more than 5,000 beneficiaries.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm border-0 rounded-4 h-100">
                    <div class="card-body p-4">
                        <h5 class="card-title">Governance Improvement Project</h5>
                        <p class="text-muted">Worked with 15 local organizations to strengthen governance structures, improving transparency and accountability.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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

<x-newsletter />
@endsection
