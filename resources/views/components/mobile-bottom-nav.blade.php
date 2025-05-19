<div class="mobile-bottom-nav d-block d-lg-none sticky-bottom">
    <div class="container-fluid">
        <div class="row text-center">
            <div class="col mobile-nav-item {{ request()->is('/') ? 'active' : '' }}">
                <a href="{{ url('/') }}" class="d-flex flex-column align-items-center">
                    <i class="bi bi-house-door"></i>
                    <span>Home</span>
                </a>
            </div>
            <div class="col mobile-nav-item {{ request()->is('what-we-do') || request()->is('what-we-do/*') ? 'active' : '' }}">
                <a href="{{ url('/what-we-do') }}" class="d-flex flex-column align-items-center">
                    <i class="bi bi-briefcase"></i>
                    <span>What We Do</span>
                </a>
            </div>
            <div class="col mobile-nav-item {{ request()->is('impact') || request()->is('impact/*') ? 'active' : '' }}">
                <a href="{{ url('/impact') }}" class="d-flex flex-column align-items-center">
                    <i class="bi bi-graph-up"></i>
                    <span>Impact</span>
                </a>
            </div>
            <div class="col mobile-nav-item {{ request()->is('get-involved') || request()->is('get-involved/*') ? 'active' : '' }}">
                <a href="{{ url('/get-involved') }}" class="d-flex flex-column align-items-center">
                    <i class="bi bi-people"></i>
                    <span>Get Involved</span>
                </a>
            </div>
            <div class="col mobile-nav-item">
                <a href="#" class="d-flex flex-column align-items-center" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu" aria-controls="mobileMenu">
                    <i class="bi bi-list"></i>
                    <span>Menu</span>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Mobile Menu Offcanvas -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="mobileMenu" aria-labelledby="mobileMenuLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="mobileMenuLabel">Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ request()->is('news') || request()->is('news/*') ? 'active fw-bold' : '' }}" href="{{ url('/news') }}">
                    <i class="bi bi-newspaper me-2"></i> News
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('about') || request()->is('about/*') ? 'active fw-bold' : '' }}" href="{{ url('/about') }}">
                    <i class="bi bi-info-circle me-2"></i> About
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('contact-us') || request()->is('contact-us/*') ? 'active fw-bold' : '' }}" href="{{ url('/contact-us') }}">
                    <i class="bi bi-envelope me-2"></i> Contact Us
                </a>
            </li>
            <li class="nav-item mt-3">
                <a href="{{ url('/donate') }}" class="btn btn-primary w-100">
                    <i class="bi bi-heart-fill me-2"></i> Donate
                </a>
            </li>
        </ul>
    </div>
</div>