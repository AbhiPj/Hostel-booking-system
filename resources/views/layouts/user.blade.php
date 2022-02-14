<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{asset('css/userStyle.css')}}">
    <script src="{{ asset('js/app.js') }}" defer></script>

</head>
<body>
<nav class="nav">
    <div class="nav-menu flex-row">
        <div class="nav-brand">
            <a href="#" class="text-gray">Bookaholic</a>
        </div>
        <div class="toggle-collapse">
            <div class="toggle-icons">
                <i class="fas fa-bars"></i>
            </div>
        </div>
        <div>
            <ul class="nav-items">
                <li class="nav-link">
                    <a href="#">Home</a>
                </li>
                <li class="nav-link">
                    <a href="#">Category</a>
                </li>
                <li class="nav-link">
                    <a href="#">Archive</a>
                </li>
                <li class="nav-link">
                    <a href="#">Pages</a>
                </li>
                <li class="nav-link">
                    <a href="#">Contact Us</a>
                </li>
            </ul>
        </div>
        <div class="social text-gray">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
        </div>
    </div>
</nav>

<main>
        @yield('content')
</main>
</body>

</html>
