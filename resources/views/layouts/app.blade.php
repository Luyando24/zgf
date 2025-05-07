<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sinoway Edu')</title>

    <!-- Local Bootstrap CSS -->
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">




    <!-- Optional: Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    
    <!-- Your custom CSS (optional) -->
    @vite('resources/css/app.css')
</head>
<body class="roboto-condensed-400 text-dark">

    
    @include('components.top-bar')
    @include('components.header')

    <main class="py-4">
        @yield('content')
    </main>

    @include('components.footer')

    <!-- Local Bootstrap Bundle JS -->
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <!-- Your custom JS (optional) -->
    @vite('resources/js/app.js')
    
</body>
</html>
