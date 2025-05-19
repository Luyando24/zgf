<section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <h2 class="display-5 fw-bold mb-3">Get Involved</h2>
                <p class="lead mb-4">Join us in strengthening civil society and promoting good governance across Zambia. There are many ways you can contribute to our mission.</p>
                <div class="d-inline-block position-relative">
                    <div class="accent-line"></div>
                </div>
            </div>
        </div>
        
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <!-- Card 1 -->
            <div class="col">
                <a href="{{ route('partnership-request') }}" class="text-decoration-none">
                    <div class="card h-100 border-0 shadow-sm hover-card">
                        <div class="card-body text-center p-4">
                            <div class="icon-circle mb-3">
                                <i class="bi bi-people-fill fs-3"></i>
                            </div>
                            <h4 class="card-title fw-bold mb-3">Partner With Us</h4>
                            <p class="card-text text-muted">Collaborate with us to support community-led development and civil society growth across Zambia.</p>
                            <div class="mt-3">
                                <span class="btn-outline-custom">Learn more <i class="bi bi-arrow-right ms-2"></i></span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            
            <!-- Card 2 -->
            <div class="col">
                <a href="{{ route('donate') }}" class="text-decoration-none">
                    <div class="card h-100 border-0 shadow-sm hover-card">
                        <div class="card-body text-center p-4">
                            <div class="icon-circle mb-3">
                                <i class="bi bi-heart-fill fs-3"></i>
                            </div>
                            <h4 class="card-title fw-bold mb-3">Make a Donation</h4>
                            <p class="card-text text-muted">Support our work by contributing to initiatives that empower local communities and strengthen their capacities.</p>
                            <div class="mt-3 primary-text">Learn more <i class="bi bi-arrow-right"></i></div>
                        </div>
                    </div>
                </a>
            </div>
            
            <!-- Card 3 -->
            <div class="col">
                <a href="{{ route('partnership-request') }}" class="text-decoration-none">
                    <div class="card h-100 border-0 shadow-sm hover-card">
                        <div class="card-body text-center p-4">
                            <div class="icon-circle mb-3">
                                <i class="bi bi-diagram-3-fill fs-3"></i>
                            </div>
                            <h4 class="card-title fw-bold mb-3">Join Our Network</h4>
                            <p class="card-text text-muted">Connect with like-minded organizations and individuals working to build stronger, self-sustaining communities.</p>
                            <div class="mt-3 primary-text">Learn more <i class="bi bi-arrow-right"></i></div>
                        </div>
                    </div>
                </a>
            </div>
            
            <!-- Card 4 -->
            <div class="col">
                <a href="{{ route('volunteer') }}" class="text-decoration-none">
                    <div class="card h-100 border-0 shadow-sm hover-card">
                        <div class="card-body text-center p-4">
                            <div class="icon-circle mb-3">
                                <i class="bi bi-hand-thumbs-up-fill fs-3"></i>
                            </div>
                            <h4 class="card-title fw-bold mb-3">Volunteer</h4>
                            <p class="card-text text-muted">Share your skills and time to support our community initiatives and capacity-building efforts.</p>
                            <div class="mt-3 primary-text">Learn more <i class="bi bi-arrow-right"></i></div>
                        </div>
                    </div>
                </a>
            </div>
            
            <!-- Card 5 -->
            <div class="col">
                <a href="{{ route('sponsor') }}" class="text-decoration-none">
                    <div class="card h-100 border-0 shadow-sm hover-card">
                        <div class="card-body text-center p-4">
                            <div class="icon-circle mb-3">
                                <i class="bi bi-building-fill fs-3"></i>
                            </div>
                            <h4 class="card-title fw-bold mb-3">Sponsor a Community Initiative</h4>
                            <p class="card-text text-muted">Directly fund specific projects that uplift rural and peri-urban communities through sustainable solutions.</p>
                            <div class="mt-3 primary-text">Learn more <i class="bi bi-arrow-right"></i></div>
                        </div>
                    </div>
                </a>
            </div>
            
            <!-- Card 6 -->
            <div class="col">
                <a href="{{ route('report') }}" class="text-decoration-none">
                    <div class="card h-100 border-0 shadow-sm hover-card">
                        <div class="card-body text-center p-4">
                            <div class="icon-circle mb-3">
                                <i class="bi bi-megaphone-fill fs-3"></i>
                            </div>
                            <h4 class="card-title fw-bold mb-3">Report Abuse or Raise Awareness</h4>
                            <p class="card-text text-muted">Help shine a light on injustice—submit reports of abuse or collaborate on awareness campaigns.</p>
                            <div class="mt-3 primary-text">Learn more <i class="bi bi-arrow-right"></i></div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<style>
.icon-circle {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
    background-color: rgba(97, 165, 52, 0.1);
    color: #61A534;
    transition: all 0.3s ease;
}

.primary-text {
    color: #61A534;
    font-weight: 500;
    transition: all 0.3s ease;
}

.hover-card {
    transition: all 0.3s ease;
    border-radius: 15px;
    overflow: hidden;
}

.hover-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1) !important;
}

.hover-card:hover .icon-circle {
    background-color: #61A534;
    color: white;
    transform: scale(1.1);
}

.hover-card:hover .primary-text {
    color: #538F2C;
    padding-left: 10px;
}

.accent-line {
    width: 80px;
    height: 4px;
    background: #61A534;
    margin: 0 auto;
    border-radius: 2px;
    margin-top: 20px;
}

.card {
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(10px);
}

.card-title {
    color: #333;
    font-size: 1.4rem;
}

.card-text {
    font-size: 0.95rem;
    line-height: 1.6;
}

@media (max-width: 767px) {
    .icon-circle {
        width: 70px;
        height: 70px;
    }
    
    .card-title {
        font-size: 1.2rem;
    }
    
    .card-text {
        font-size: 0.9rem;
    }
}

.btn-outline-custom {
    color: #61A534;
    border: 2px solid #61A534;
    padding: 8px 20px;
    border-radius: 25px;
    font-weight: 500;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 5px;
}

.hover-card:hover .btn-outline-custom {
    background-color: #61A534;
    color: white;
}

.btn-outline-custom i {
    transition: transform 0.3s ease;
}

.hover-card:hover .btn-outline-custom i {
    transform: translateX(5px);
}
</style>
