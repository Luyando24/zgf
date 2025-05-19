<footer class="pt-5 pb-4" style="background-color: #d1d8cc;">
    <div class="container">
        <div class="row g-4">
            <!-- About ZGF -->
            <div class="col-md-4 col-lg-4 mb-4 mb-md-0">
                <a class="footer-logo d-inline-block mb-3" href="/">
                    <img src="{{ asset('images/logo.png') }}" alt="ZGF Logo" class="img-fluid" style="max-height: 60px;">
                </a>
                <p class="text-dark mb-3">
                    The Zambian Governance Foundation strengthens civil society and promotes accountable governance through local solutions and partnerships.
                </p>
                <!-- Social Media Icons -->
                <div class="social-icons d-flex gap-2 mb-3">
                    <a href="https://facebook.com/zgf" class="social-icon" aria-label="Facebook">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="https://twitter.com/zgf" class="social-icon" aria-label="Twitter">
                        <i class="bi bi-twitter-x"></i>
                    </a>
                    <a href="https://linkedin.com/company/zgf" class="social-icon" aria-label="LinkedIn">
                        <i class="bi bi-linkedin"></i>
                    </a>
                    <a href="https://instagram.com/zgf" class="social-icon" aria-label="Instagram">
                        <i class="bi bi-instagram"></i>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="col-6 col-md-2 col-lg-2 mb-4 mb-md-0">
                <h6 class="footer-heading mb-3">Quick Links</h6>
                <ul class="footer-links">
                    <li><a href="/" class="footer-link">Home</a></li>
                    <li><a href="{{ url('about') }}" class="footer-link">About</a></li>
                    <li><a href="{{ url('grants') }}" class="footer-link">Grants</a></li>
                    <li><a href="{{ url('contact') }}" class="footer-link">Contact</a></li>
                </ul>
            </div>

            <!-- Programs -->
            <div class="col-6 col-md-3 col-lg-3 mb-4 mb-md-0">
                <h6 class="footer-heading mb-3">Our Work</h6>
                <ul class="footer-links">
                    <li><a href="{{ url('civil-society') }}" class="footer-link">Civil Society Support</a></li>
                    <li><a href="{{ url('capacity') }}" class="footer-link">Capacity Development</a></li>
                    <li><a href="{{ url('fundraising') }}" class="footer-link">Local Fundraising</a></li>
                    <li><a href="{{ url('governance') }}" class="footer-link">Governance Dialogue</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="col-md-3 col-lg-3 mb-md-0">
                <h6 class="footer-heading mb-3">Contact Us</h6>
                <ul class="footer-contact">
                    <li class="d-flex mb-2">
                        <i class="fas fa-map-marker-alt me-2 mt-1"></i>
                        <span>Plot 35B, Great East Road<br>Lusaka, Zambia</span>
                    </li>
                    <li class="d-flex mb-2">
                        <i class="fas fa-envelope me-2 mt-1"></i>
                        <a href="mailto:info@zgf.org.zm" class="footer-link">info@zgf.org.zm</a>
                    </li>
                    <li class="d-flex mb-2">
                        <i class="fas fa-phone me-2 mt-1"></i>
                        <a href="tel:+260211259784" class="footer-link">+260 211 259784</a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Newsletter Signup -->
        <div class="newsletter-section mt-4 p-3 rounded-3 mb-4">
            <div class="row align-items-center">
                <div class="col-md-6 mb-3 mb-md-0">
                    <h6 class="mb-0">Subscribe to our newsletter</h6>
                    <p class="mb-0 small">Stay updated with our latest news and updates</p>
                </div>
                <div class="col-md-6">
                    <form action="{{ route('newsletter.subscribe') }}" method="POST" class="d-flex">
                        @csrf
                        <input type="email" name="email" class="form-control me-2" placeholder="Your email address" required>
                        <button type="submit" class="btn btn-primary">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="text-center pt-3 mt-3 border-top border-secondary">
            <p class="mb-0 text-dark">
                &copy; {{ date('Y') }} Zambian Governance Foundation. All rights reserved.
                <span class="d-block d-md-inline mt-1 mt-md-0">
                    Web design by <a class="text-decoration-none credit-link" style="color: #61A534;" href="https://spaceminds.agency/" target="_blank" rel="noopener">Spaceminds</a>
                </span>
            </p>
        </div>
    </div>
</footer>


