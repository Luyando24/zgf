<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ZGF - Zambian Governance Foundation')</title>

    <!-- Local Bootstrap CSS -->
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}">
<!-- Wow js cdn -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- Optional: Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    
    <!-- custom CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="roboto-condensed-400 text-dark">

    
    @include('components.top-bar')
    @include('components.header')

    <main class="py-4">
        @yield('content')
    </main>

    @include('components.footer')

    <!-- Mobile Bottom Navigation -->
    <nav class="mobile-bottom-nav d-md-none">
        <div class="container">
            <div class="row justify-content-around">
                <div class="col mobile-nav-item {{ request()->is('/') ? 'active' : '' }}">
                    <a href="{{ route('home') }}">
                        <i class="bi bi-house-door"></i>
                        <span>Home</span>
                    </a>
                </div>
                <div class="col mobile-nav-item {{ request()->is('about*') ? 'active' : '' }}">
                    <a href="{{ route('about') }}">
                        <i class="bi bi-info-circle"></i>
                        <span>About</span>
                    </a>
                </div>
                <div class="col mobile-nav-item {{ request()->is('programs*') ? 'active' : '' }}">
                    <a href="{{ route('get-involved') }}">
                        <i class="bi bi-grid"></i>
                        <span>Get Involved</span>
                    </a>
                </div>
                <div class="col mobile-nav-item {{ request()->is('contact*') ? 'active' : '' }}">
                    <a href="{{ route('contact') }}">
                        <i class="bi bi-envelope"></i>
                        <span>Contact</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Local Bootstrap Bundle JS -->
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <!-- Your custom JS (optional) -->
    @vite('resources/js/app.js')
    <!-- Wow js cdn -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
    
    @stack('scripts')
</body>
<style>
    .primary-button{
    background-color: #61A534;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 27px;
    cursor: pointer;
}
.outlined-button {
    background-color: transparent;
    color: #fff;
    border: 2px solid #fff;
    padding: 10px 20px;
    border-radius: 27px;
    cursor: pointer;
    margin-left: 10px;
}

.outlined-button:hover {
    background-color: #538F2C;
    color: white;
}


.primary-button:hover{
    background-color: #538F2C;
    color: white;
}

.primary-button:active{
    background-color: #538F2C;
}

.primary-color{
    color: #61A534;
}

.heading{
    font-weight: bold;
    color: #303030;
}

.secondary-color{
    color: #FFDD02;
}
.carousel-item img {
    height: 585px; /* Set the desired height */
    object-fit: cover; /* Cover the entire area without distortion */
    border-radius: 0px;
}
.carousel{
    margin-top: -25px;
}
/* Desktop Hero Styles (Original) */
.carousel-caption-overlay {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    max-width: 800px;
    width: 90%;
    background-color: rgba(0, 0, 0, 0.6);
    border-radius: 8px;
    z-index: 2;
    text-align: center;
}

.main-heading {
    color: #fff !important;
    font-weight: 700;
    margin-bottom: 0;
    font-size: 2.5rem;
    line-height: 1.2;
}

.sub-heading {
    color: #fff !important;
    font-size: 1.2rem;
    line-height: 1.5;
}

.hero-buttons {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 10px;
}

/* Mobile Hero Styles (New) */
.carousel-caption-overlay-mobile {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background-color: rgba(0, 0, 0, 0.7);
    z-index: 2;
    text-align: center;
    padding: 15px;
}

.mobile-main-heading {
    color: #fff !important;
    font-weight: 700;
    font-size: 1.4rem;
    line-height: 1.2;
    margin-bottom: 0;
}

.mobile-sub-heading {
    color: #fff !important;
    font-size: 0.9rem;
    line-height: 1.3;
    margin-bottom: 0;
}

.mobile-hero-buttons {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

/* Button Styles (Shared) */
.primary-button, .outlined-button {
    display: inline-block;
    padding: 10px 20px;
    border-radius: 5px;
    font-weight: 600;
    text-decoration: none !important;
    transition: all 0.3s ease;
}

.primary-button {
    background-color: #61A534;
    color: white !important;
    border: 2px solid #61A534;
}

.outlined-button {
    background-color: transparent;
    color: white !important;
    border: 2px solid white;
}

.primary-button:hover {
    background-color: #548e2d;
    border-color: #548e2d;
}

.outlined-button:hover {
    background-color: rgba(255, 255, 255, 0.2);
}

/* Responsive adjustments for desktop */
@media (min-width: 768px) {
    .carousel-item img {
        height: 585px;
        object-fit: cover;
    }
}

/* Responsive adjustments for mobile */
@media (max-width: 767px) {
    .carousel-item img {
        min-height: 400px;
        object-fit: cover;
    }
    
    .primary-button, .outlined-button {
        padding: 8px 16px;
        font-size: 0.9rem;
    }
}

/* Fix for very small screens */
@media (max-width: 360px) {
    .mobile-main-heading {
        font-size: 1.2rem;
    }
    
    .mobile-sub-heading {
        font-size: 0.8rem;
    }
    
    .hero-buttons {
        flex-direction: column;
        align-items: center;
        gap: 8px;
    }
    
    .primary-button, .outlined-button {
        width: 80%;
    }
}
  
.university-card:hover {
    transform: scale(1.05);
    transition: transform 0.3s ease;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    cursor: pointer;
}
.badge-option {
    background: linear-gradient(135deg, #61A534, #62c520);
    color: white;
    font-weight: 500;
    font-size: 1rem;
    transition: transform 0.2s ease;
    cursor: pointer;
}

.badge-option:hover {
    transform: scale(1.05);
    box-shadow: 0 0 10px rgba(0,0,0,0.15);
}
.card-img-top {
    height: 200px;
    object-fit: cover;
}

.card-body {
    background-color: white;
}

.card-title {
    font-size: 1.25rem;
    font-weight: bold;
}

.card-text {
    font-size: 0.9rem;
    color: #6c757d;
}
footer li a:hover {
    color: #59be16;

}
.navbar-brand img {
    height: 60px; 
    width: auto;
}
.university-card:hover {
    transform: scale(1.05);
    transition: transform 0.3s ease;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    cursor: pointer;
}

/* Adjust for small screens */
@media (max-width: 576px) {
    .carousel-caption-overlay {
        position: absolute !important; /* Keep absolute positioning */
        top: 60%; /* Adjust top positioning */
        left: 50%; /* Ensure it's horizontally centered */
        transform: translateX(-50%) translateY(-50%) !important; /* Center both horizontally and vertically */
        padding: 1rem; /* Add padding */
        text-align: center;
        z-index: 2; /* Ensure it stays on top */
    }

    .carousel-caption-overlay h1,
    .carousel-caption-overlay h5 {
        font-size: 1.25rem;
        line-height: 1.4;
    }

    .carousel-caption-overlay form .row {
        flex-direction: column;
        align-items: stretch;
    }

    .carousel-caption-overlay .form-select,
    .carousel-caption-overlay .form-control,
    .carousel-caption-overlay .btn {
        width: 100% !important;
        max-width: 100% !important;
        margin-bottom: 0.75rem;
    }

    .carousel-caption-overlay button[type="submit"] {
        margin-top: 0.5rem;
    }
}
  
  .roboto-condensed-400 {
    font-family: "Roboto Condensed", sans-serif;
    font-optical-sizing: auto;
    font-weight: 400;
    font-style: normal;
  }
  .main-heading{
    font-size: 50px;
  }

  .stats-box {
    background-color: #61A534;
    border-radius: 18px;
    color: #fff;
}

.stat-number {
    font-size: 2.8rem;
    font-weight: bold;
    margin-bottom: 0.5rem;
    transition: transform 0.3s ease;
}

.stat-text {
    font-size: 1.1rem;
    margin: 0;
}

.stat-number:hover {
    transform: scale(1.1);
}

/* Responsive typography */
@media (max-width: 768px) {
    .stat-number {
        font-size: 2rem;
    }

    .stat-text {
        font-size: 1rem;
    }
}

.btn-outline-primary{
    border: 2px soliid #61A534;
    color: #61A534;
}
.btn-outline-primary:hover{
    background-color: #61A534;
    color: white;
}

/* Subscription confirmation modal */
.modal-overlay {
    position: fixed;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background-color: rgba(0,0,0,0.6);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 9999;
  }

  .modal-content {
    background: white;
    padding: 30px;
    border-radius: 10px;
    max-width: 400px;
    text-align: center;
    position: relative;
    color: #333;
  }

  .modal-close {
    position: absolute;
    top: 10px;
    right: 15px;
    font-size: 24px;
    cursor: pointer;
}
.modal-button {
    background-color: #61A534;
    border: none;
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  .modal-button:hover {
    background-color: #538F2C;
  }
  .rounded-card{
    border-radius: 10px;
  }
  .bg-primary-custom{
    background-color: #61A534;
  }
  .btn-primary{
    background: #61A534;
    border: 1px solid #61A534;
  }
  .btn-primary:hover{
    background: #538F2C;
    border: 1px solid #61A534;
    color: #fff;
  }
  .btn-outline-primary{
    border: 1px solid #61A534;
  }
  .bg-primary{
    background-color: #61A534 !important;
  }

/* Footer Styles */
footer {
    background-color: #d1d8cc;
    font-size: 0.95rem;
}

.footer-logo {
    transition: opacity 0.3s ease;
}

.footer-logo:hover {
    opacity: 0.8;
}

.footer-heading {
    font-weight: 700;
    text-transform: uppercase;
    color: #333;
    position: relative;
    padding-bottom: 10px;
}

.footer-heading::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 40px;
    height: 3px;
    background-color: #61A534;
}

.footer-links {
    list-style: none;
    padding-left: 0;
    margin-bottom: 0;
}

.footer-links li {
    margin-bottom: 8px;
}

.footer-link {
    color: #333;
    text-decoration: none;
    transition: color 0.2s ease, transform 0.2s ease;
    display: inline-block;
}

.footer-link:hover {
    color: #61A534;
    transform: translateX(3px);
}

.footer-contact {
    list-style: none;
    padding-left: 0;
    margin-bottom: 0;
}

.footer-contact i {
    color: #61A534;
    width: 16px;
    text-align: center;
}

.social-icons {
    display: flex;
}

.social-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 36px;
    height: 36px;
    background-color: #61A534;
    color: white !important;
    border-radius: 50%;
    transition: all 0.3s ease;
    text-decoration: none;
    font-size: 1.1rem;
}

.social-icon:hover {
    background-color: #333;
    color: white !important;
    transform: translateY(-3px);
}

/* Fix for Bootstrap Icons alignment */
.social-icon i {
    display: flex;
    align-items: center;
    justify-content: center;
}

.newsletter-section {
    background-color: rgba(97, 165, 52, 0.1);
    border-left: 4px solid #61A534;
}

.newsletter-section .btn-primary {
    background-color: #61A534;
    border-color: #61A534;
}

.newsletter-section .btn-primary:hover {
    background-color: #548e2d;
    border-color: #548e2d;
}

/* Responsive adjustments */
@media (max-width: 767px) {
    .footer-heading {
        margin-top: 10px;
    }
    
    .social-icons {
        justify-content: center;
    }
    
    .newsletter-section form {
        flex-direction: column;
    }
    
    .newsletter-section input {
        margin-bottom: 10px;
        margin-right: 0 !important;
    }
}

.credit-link:hover{
    color: #548e2d;
}

/* Donation Page Styles */
.donation-hero {
    background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), 
                url('/images/donationbg.jpg') no-repeat center center;
    background-size: cover;
    padding: 100px 0;
    margin-top: -25px;
}

.icon-circle {
    width: 70px;
    height: 70px;
    background-color: rgba(97, 165, 52, 0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
    color: #61A534;
}

.hover-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.hover-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
}

.bank-details {
    background-color: rgba(97, 165, 52, 0.05);
    border-left: 3px solid #61A534;
}

.testimonial {
    position: relative;
}

.testimonial .bi-quote {
    color: rgba(97, 165, 52, 0.2);
    position: absolute;
    top: 10px;
    left: 10px;
    z-index: 0;
}

.testimonial p, .testimonial div {
    position: relative;
    z-index: 1;
}

/* Responsive adjustments */
@media (max-width: 767px) {
    .donation-hero {
        padding: 60px 0;
    }
    
    .donation-hero h1 {
        font-size: 2rem;
    }
    
    .icon-circle {
        width: 60px;
        height: 60px;
    }
}

/* Mobile Bottom Navigation */
.mobile-bottom-nav {
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    background-color: white;
    box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
    padding: 10px 0 5px;
    z-index: 1030;
    display: none;
}

.mobile-nav-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
}

.mobile-nav-item a {
    color: #333;
    text-decoration: none;
    font-size: 0.7rem;
    transition: color 0.2s ease;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.mobile-nav-item i {
    font-size: 1.3rem;
    margin-bottom: 2px;
}

.mobile-nav-item.active a {
    color: #61A534;
    font-weight: 500;
}

/* Show mobile navigation on mobile devices */
@media (max-width: 991.98px) {
    .mobile-bottom-nav {
        display: block;
    }
    
    /* Add padding to body to prevent content from being hidden behind nav */
    body {
        padding-bottom: 65px;
    }
}

/* Mobile-specific button styles for about section */
@media (max-width: 767px) {
    .about-section-buttons {
        display: flex;
        flex-direction: column;
        gap: 8px;
        width: 100%;
    }
    
    .about-section-buttons .btn {
        width: 100%;
        margin-bottom: 8px;
    }
}

/* Ensure outlined button has proper styling on light backgrounds */
.outlined-button-mobile.on-light {
    background-color: transparent;
    color: #61A534 !important;
    border: 2px solid #61A534;
}

.outlined-button-mobile.on-light:hover {
    background-color: rgba(97, 165, 52, 0.1);
}

/* About section buttons container */
.about-section-buttons {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

/* Secondary button specifically for the about section */
.about-secondary-button {
    background-color: transparent;
    color: #61A534;
    border: 2px solid #61A534;
    border-radius: 27px;
    padding: 10px 20px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.about-secondary-button:hover {
    background-color: rgba(97, 165, 52, 0.1);
    color: #538F2C;
    border-color: #538F2C;
    transform: translateY(-2px);
}

.about-secondary-button:active {
    transform: translateY(0);
}

/* Mobile-specific styling for about section buttons */
@media (max-width: 767px) {
    .about-section-buttons {
        flex-direction: row;
        justify-content: flex-start;
        margin-top: 15px;
    }
    
    .about-secondary-button {
        margin-top: 5px;
    }
}

/* Extra small devices */
@media (max-width: 575px) {
    .about-section-buttons {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .about-section-buttons .btn {
        width: 100%;
        text-align: center;
        margin-bottom: 8px;
    }
}

/* Mobile navigation alignment */
@media (max-width: 991.98px) {
  #mainNavbar .navbar-nav {
    text-align: right;
    width: 100%;
  }
  
  #mainNavbar .nav-link {
    padding-right: 1rem;
  }
}
/* Custom Hamburger Menu */
.custom-toggler {
    padding: 0;
    width: 30px;
    height: 30px;
    position: relative;
    transition: .5s ease-in-out;
    z-index: 1031; /* Ensure it stays above the mobile menu */
}

.hamburger-icon {
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    padding: 5px 0;
}

.hamburger-icon span {
    display: block;
    width: 100%;
    height: 2px;
    background: #61A534;
    border-radius: 3px;
    transition: all 0.3s ease;
    transform-origin: left center;
}

/* Animation for hamburger to X */
.custom-toggler[aria-expanded="true"] .hamburger-icon span:first-child {
    transform: rotate(45deg);
    width: 120%;
}

.custom-toggler[aria-expanded="true"] .hamburger-icon span:nth-child(2) {
    opacity: 0;
    width: 0;
}

.custom-toggler[aria-expanded="true"] .hamburger-icon span:last-child {
    transform: rotate(-45deg);
    width: 120%;
}

/* Mobile menu overlay animation */
.navbar-collapse {
    transition: all 0.3s ease-in-out;
}

@media (max-width: 991.98px) {
    .navbar-collapse {
        background: white;
        position: fixed;
        top: 0;  /* Changed from 80px to 0 */
        left: 0;
        right: 0;
        bottom: 0;
        padding: 5rem 2rem 2rem;  /* Added top padding to accommodate the header */
        z-index: 1030;
        transform: translateX(100%);
    }

    .navbar-collapse.show {
        transform: translateX(0);
    }

    .navbar-nav {
        gap: 1.5rem;
    }

    .nav-link {
        font-size: 1.2rem;
        padding: 0.5rem 0;
    }

    /* Ensure the header stays above the mobile menu */
    .navbar {
        position: relative;
        z-index: 1031;
        background: white;
    }
}

/* Resources Section Styles */
.resources-section {
    background-color: #f8f9fa;
}

.resource-card {
    height: 100%;
}

.resource-icon {
    width: 50px;
    height: 50px;
    background-color: rgba(97, 165, 52, 0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #61A534;
}

.resource-icon i {
    font-size: 1.5rem;
}

.resource-card .card {
    height: 100%;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.resource-card .card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
}

.resource-card .btn {
    width: 100%;
}

@media (max-width: 767px) {
    .resource-card {
        margin-bottom: 20px;
    }
    
    .resource-card:last-child {
        margin-bottom: 0;
    }
}
</style>
</html>




