<section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <h2 class="display-5 fw-bold mb-3">Get Involved</h2>
                <p class="lead">Join us in strengthening civil society and promoting good governance across Zambia. There are many ways you can contribute to our mission.</p>
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
                            <div class="mt-3 primary-text">Learn more <i class="bi bi-arrow-right"></i></div>
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
    width: 70px;
    height: 70px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
    background-color: #61A534;
    color: white;
}

.primary-text {
    color: #61A534;
}

.hover-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.hover-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
}

.hover-card:hover .icon-circle {
    background-color: #538F2C;
}
</style>
