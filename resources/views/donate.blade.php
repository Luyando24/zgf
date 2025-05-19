@extends('layouts.app')

@section('content')
<div class="donation-hero py-5 text-white text-center" style="background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), 
            url('{{ asset('images/donationbg.jpg') }}') no-repeat center center; background-size: cover;">
    <div class="container py-4">
        <h1 class="display-4 fw-bold mb-3">Support Our Mission</h1>
        <p class="lead mb-4">Your donation helps us strengthen civil society and empower communities across Zambia</p>
        <div class="d-flex justify-content-center">
            <a href="#donate-now" class="btn btn-primary btn-lg px-4 me-2">Donate Now</a>
            <a href="#why-donate" class="btn btn-outline-light btn-lg px-4">Learn More</a>
        </div>
    </div>
</div>

<section id="why-donate" class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <img src="{{ asset('images/impact.jpg') }}" alt="Community Impact" class="img-fluid rounded-3 shadow">
            </div>
            <div class="col-lg-6">
                <h2 class="fw-bold mb-4">Why Your Support Matters</h2>
                <p class="mb-4">Your donation to the Zambian Governance Foundation directly supports our work with local civil society organizations and community-based initiatives across Zambia.</p>
                
                <div class="d-flex mb-3">
                    <div class="me-3">
                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                            <i class="bi bi-people-fill fs-4"></i>
                        </div>
                    </div>
                    <div>
                        <h5 class="fw-bold">Strengthening Communities</h5>
                        <p>Your support helps build the capacity of local organizations to address community needs effectively.</p>
                    </div>
                </div>
                
                <div class="d-flex mb-3">
                    <div class="me-3">
                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                            <i class="bi bi-megaphone-fill fs-4"></i>
                        </div>
                    </div>
                    <div>
                        <h5 class="fw-bold">Amplifying Local Voices</h5>
                        <p>We help marginalized communities participate in governance processes that affect their lives.</p>
                    </div>
                </div>
                
                <div class="d-flex">
                    <div class="me-3">
                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                            <i class="bi bi-graph-up-arrow fs-4"></i>
                        </div>
                    </div>
                    <div>
                        <h5 class="fw-bold">Sustainable Development</h5>
                        <p>We promote locally-led solutions that create lasting positive change in communities.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="impact-stats" class="py-5 bg-primary text-white text-center">
    <div class="container">
        <h2 class="fw-bold mb-5">Your Donation Makes a Difference</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="p-4 rounded-3 h-100 stats-box">
                    <div class="stat-number">100+</div>
                    <p class="stat-text">Local organizations supported</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 rounded-3 h-100 stats-box">
                    <div class="stat-number">50,000+</div>
                    <p class="stat-text">Community members reached</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 rounded-3 h-100 stats-box">
                    <div class="stat-number">9</div>
                    <p class="stat-text">Provinces across Zambia</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="donate-now" class="py-5">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <h2 class="fw-bold mb-3">Make Your Donation Today</h2>
                <p class="lead">Choose your preferred donation method below</p>
            </div>
        </div>
        
        <div class="row g-4 justify-content-center">
            <!-- Flutterwave Donation Option -->
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm hover-card">
                    <div class="card-body text-center p-4">
                        <div class="icon-circle mb-3">
                            <i class="bi bi-credit-card-fill fs-3"></i>
                        </div>
                        <h4 class="card-title fw-bold mb-3">Online Donation</h4>
                        <p class="card-text text-muted mb-4">Make a secure online donation using credit card, mobile money, or bank transfer.</p>
                        
                        <form>
                            <div class="mb-3">
                                <select class="form-select" id="donationAmount">
                                    <option value="50">$50</option>
                                    <option value="100">$100</option>
                                    <option value="250">$250</option>
                                    <option value="500">$500</option>
                                    <option value="1000">$1,000</option>
                                    <option value="custom">Custom Amount</option>
                                </select>
                            </div>
                            
                            <div class="mb-3 custom-amount-container d-none">
                                <input type="number" class="form-control" id="customAmount" placeholder="Enter amount in USD">
                            </div>
                            
                            <button type="button" class="btn btn-primary w-100" onclick="makePayment()">
                                Donate Now <i class="bi bi-arrow-right"></i>
                            </button>
                        </form>
                    </div>
                    <div class="card-footer bg-white border-0 text-center pb-4">
                        <img src="{{ asset('images/flutterwave-logo.png') }}" alt="Secured by Flutterwave" class="img-fluid" style="max-height: 30px;">
                    </div>
                </div>
            </div>
            
            <!-- Bank Transfer Option -->
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm hover-card">
                    <div class="card-body text-center p-4">
                        <div class="icon-circle mb-3">
                            <i class="bi bi-bank fs-3"></i>
                        </div>
                        <h4 class="card-title fw-bold mb-3">Bank Transfer</h4>
                        <p class="card-text text-muted mb-4">Make a direct bank transfer to our account.</p>
                        
                        <div class="bank-details p-3 bg-light rounded-3 text-start mb-4">
                            <p class="mb-2"><strong>Bank Name:</strong> First National Bank</p>
                            <p class="mb-2"><strong>Account Name:</strong> Zambian Governance Foundation</p>
                            <p class="mb-2"><strong>Account Number:</strong> 62345678910</p>
                            <p class="mb-2"><strong>Branch Code:</strong> 260001</p>
                            <p class="mb-0"><strong>Swift Code:</strong> FIRNZMLX</p>
                        </div>
                        
                        <a href="mailto:finance@zgf.org.zm" class="btn btn-outline-primary w-100">
                            Notify Us of Your Transfer <i class="bi bi-envelope"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Corporate Giving Option -->
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm hover-card">
                    <div class="card-body text-center p-4">
                        <div class="icon-circle mb-3">
                            <i class="bi bi-building fs-3"></i>
                        </div>
                        <h4 class="card-title fw-bold mb-3">Corporate Giving</h4>
                        <p class="card-text text-muted mb-4">Partner with us as a corporate donor to support specific initiatives.</p>
                        
                        <ul class="text-start mb-4">
                            <li class="mb-2">Corporate Social Responsibility partnerships</li>
                            <li class="mb-2">Sponsorship of specific programs</li>
                            <li class="mb-2">Employee matching gift programs</li>
                            <li>In-kind donations and services</li>
                        </ul>
                        
                        <a href="{{ route('partnership-request') }}" class="btn btn-outline-primary w-100">
                            Become a Corporate Partner <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 order-lg-2 mb-4 mb-lg-0">
                <img src="{{ asset('images/impact2.jpg') }}" alt="Donor Testimonial" class="img-fluid rounded-3 shadow">
            </div>
            <div class="col-lg-6 order-lg-1">
                <div class="testimonial p-4 bg-white rounded-3 shadow-sm">
                    <div class="mb-3">
                        <i class="bi bi-quote fs-1 text-primary"></i>
                    </div>
                    <p class="lead fst-italic mb-4">"Supporting ZGF has been one of the most rewarding decisions I've made. Seeing how they empower local communities and create sustainable change gives me confidence that my donation is making a real difference."</p>
                    <div class="d-flex align-items-center">
                        <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                            <span class="fw-bold">MM</span>
                        </div>
                        <div>
                            <h5 class="mb-0 fw-bold">Mulenga Mwansa</h5>
                            <p class="mb-0 text-muted">Donor since 2019</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="fw-bold mb-4">Have Questions About Donating?</h2>
                <p class="lead mb-4">Our team is here to help. Contact us for more information about our donation process, tax benefits, or how your contribution will be used.</p>
                <div class="d-flex justify-content-center flex-wrap gap-3">
                    <a href="mailto:donations@zgf.org.zm" class="btn btn-light btn-lg px-4">
                        <i class="bi bi-envelope me-2"></i> Email Us
                    </a>
                    <a href="{{ route('contact') }}" class="btn btn-outline-light btn-lg px-4">
                        <i class="bi bi-chat-dots me-2"></i> Contact Page
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Flutterwave Integration Script -->
<script src="https://checkout.flutterwave.com/v3.js"></script>
<script>
    // Show/hide custom amount field
    document.getElementById('donationAmount').addEventListener('change', function() {
        const customAmountContainer = document.querySelector('.custom-amount-container');
        if (this.value === 'custom') {
            customAmountContainer.classList.remove('d-none');
        } else {
            customAmountContainer.classList.add('d-none');
        }
    });
    
    // Flutterwave payment function
    function makePayment() {
        let amount;
        const selectedValue = document.getElementById('donationAmount').value;
        
        if (selectedValue === 'custom') {
            amount = document.getElementById('customAmount').value;
            if (!amount || isNaN(amount) || amount <= 0) {
                alert('Please enter a valid donation amount');
                return;
            }
        } else {
            amount = selectedValue;
        }
        
        FlutterwaveCheckout({
            public_key: "FLUTTERWAVE_PUBLIC_KEY", // Replace with your actual public key
            tx_ref: "ZGF_DON_" + Math.floor(Math.random() * 1000000000 + 1),
            amount: amount,
            currency: "USD",
            payment_options: "card, mobilemoney, ussd, bank transfer",
            redirect_url: "{{ route('donation.callback') }}",
            meta: {
                source: "website",
                purpose: "donation"
            },
            customer: {
                email: "donor@example.com", // This can be dynamically set if you collect email
                phone_number: "", // Optional
                name: "Generous Donor", // Optional
            },
            customizations: {
                title: "Zambian Governance Foundation",
                description: "Donation to support community development",
                logo: "{{ asset('images/logo.png') }}",
            },
        });
    }
</script>
@endsection