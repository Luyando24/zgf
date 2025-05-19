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
    
</body>
</html>



