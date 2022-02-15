<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{asset('css/userStyle.css')}}">
{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="{{ asset('js/app.js') }}" defer></script>

</head>
<body>
<nav class="nav">
    <div class="nav-menu flex-row">
        <div class="nav-brand">
            <a href="#" class="text-gray">HostelSansar</a>
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
{{--        <div class="social text-gray">--}}
{{--            <a href="#"><i class="fab fa-facebook-f"></i></a>--}}
{{--            <a href="#"><i class="fab fa-instagram"></i></a>--}}
{{--            <a href="#"><i class="fab fa-twitter"></i></a>--}}
{{--            <a href="#"><i class="fab fa-youtube"></i></a>--}}
{{--        </div>--}}
        <ul class="navbar-nav ms-auto">
            <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ ('Login') }}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ ('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>
                    <button class="dropbtn">
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-content" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>

                </li>
            @endguest
        </ul>
    </div>
</nav>

<main>
        @yield('content')
</main>
</body>

</html>
