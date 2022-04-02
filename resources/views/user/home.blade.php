
{{--@extends('layouts.user.user')--}}

{{--@section('content')--}}
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{asset('css/userStyle.css')}}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="{{ asset('js/app.js') }}" defer></script>

</head>

    <nav style="background-color: #30b1f7; position:relative;"  class="navbar navbar-expand-md ">
        <div class="container">
            @if(session()->has('exists'))
                <div class="alert alert-success">
                    <script>
                        swal("Error", "Already requested", "error");
                    </script>
                </div>
            @endif
            <a style="font-size: 20px" class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item mx-3">
                            <a style="color:white; font-size: 15px" class="nav-link" href="{{ route('membership.index') }}">Membership</a>
                        </li>
                        <li class="nav-item mx-3">
                            <a style="color: white" class="nav-link" href="/user/requestHostel">Add your hostel</a>
                        </li>
                        <li class="nav-item mx-3    ">
                            <a style="color: white"  class="nav-link" href="/user/messages">Messages</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a style="color:white; margin-right: 35px; font-size: 15px" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                            </div>
                        </li>


                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
    {{--        </div>--}}

            </li>
            @endguest
            </ul>
        </div>
        </div>
</nav>

<style>
    a{
        color: white;
    }
</style>

<link rel="stylesheet" href="{{asset('css/userHomeStyle.css')}}">


    <section>
        <div id="home-main" class="home-main">
                <div class="title-container">
                    <h1 class="primary-text">Welcome to Hostel Sansar</h1>

                    <h2 class="secondary-text">Tagline</h2>
                    <p class="long-text">Find a place you can call home.</p>
{{--                    <button class="home-btn">Read More</button>--}}
                </div>
        </div>
    </section>

<section>
    <div class="search-container">
        <div class="row">
            <div class="col-md-12">
                <form class="form_book">
                    <div class="row">
{{--                        <div class="col-md-3">--}}
{{--                            <label class="date">ARRIVAL DATE</label>--}}
{{--                            <input class="book_n" type="date">--}}
{{--                        </div>--}}
{{--                        <div class="col-md-3">--}}
{{--                            <label class="date">DEPARTURE DATE</label>--}}
{{--                            <input class="book_n" type="date">--}}
{{--                        </div>--}}
{{--                        <div class="col-md-3">--}}
{{--                            <label class="date">PERSON</label>--}}
{{--                            <input class="book_n" placeholder="2" type="type" name="2">--}}
{{--                        </div>--}}
{{--                        <div class="col-md-3">--}}
{{--                            <button class="book_btn">Book Now</button>--}}
{{--                        </div>--}}


                        <div class="col-md-3" style="margin-left: 450px">
{{--                            <input style="width: 105%; margin-top: 10px" class="search-box" placeholder="" type="type" name="2">--}}
                        </div>
                        <div style="margin-left: 520px" class="col-md-6">
{{--                            <button class="btn btn-dark">Book Now</button>--}}
{{--                            <a  class="read_more" href="#hostel-main">See More</a>--}}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<div id="hostel-main" class="hostel-main">
    <div id="hostel-container" class="hostel-container">
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-6">
                <div class="choose_box">
                    <div class="titlepage">
                        <h2><span class="text_norlam">Choose The Perfect</span> <br>Hostel</h2>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                        et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                        aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit </p>
                    <a class="read_more" href="/user/hostels">See More</a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="img_box">
                            <figure><img src="{{asset('images/background/00.jpg')}}" alt="#" /></figure>
                        </div>
                    </div>
{{--                    <div class="col-md-6">--}}
{{--                        <div class="img_box">--}}
{{--                            <figure><img src="images/img2.jpg" alt="#" /></figure>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-6">--}}
{{--                        <div class="img_box">--}}
{{--                            <figure><img src="images/img3.jpg" alt="#" /></figure>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="our">
    <div class="hostel-container">
        <div class="row d_flex">
            <div class="col-md-6">
                <div class="img_box">
                    <figure><img src="{{asset('images/background/5.jpg')}}" alt="#" /></figure>
                </div>
            </div>
            <div class="col-md-6">
                <div class="our_box">
                    <div class="titlepage">
                        <h2><span class="text_norlam">Our Featured </span> <br>Hostels</h2>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                        et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                        aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit </p>
                    <a class="read_more" href="/user/features/hostel">Read More</a>
                </div>
            </div>
        </div>
    </div>
</div>



<div id="about" class="about">
    <div class="container-fl">
        <div class="row d_flex">
            <div class="col-md-6">
                <div class="about_text">
                    <div class="titlepage">
                        <h2>About Us</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                            voluptate velit </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="about_img">
                    <figure><img src="images/about_img.jpg" alt="#" /></figure>
                </div>
            </div>
        </div>
    </div>
</div>



    <script>
        // var prevScrollTop = 0;
        // var $scrollDiv    = $('div#hostel-container');
        // var $currentDiv   = $('div#home-main');
        // $scrollDiv.scroll(function(eventObj)
        // {
        //     var curScrollTop = $scrollDiv.scrollTop();
        //     if (prevScrollTop < curScrollTop)
        //     {
        //         // Scrolling down:
        //         $currentDiv = $currentDiv.next().scrollTo();
        //     }
        //     else if (prevScrollTop > curScrollTop)
        //     {
        //         // Scrolling up:
        //         $currentDiv = $currentDiv.prev().scrollTo();
        //     }
        //     prevScrollTop = curScrollTop;
        // });
        $('html, body').animate({
            scrollTop: $("#title-container").offset().top
        }, 1000);    </script>

    <script>
        $(window).scroll(function() {
            if ($(this).scrollTop()>250)
            {
                $('.long-text').hide(0);
            }
            else
            {
                $('.long-text').show(0);

            }
            if ($(this).scrollTop()>410)
            {
                $('.primary-text').hide(0);
                $('.title-container').css("position","relative");

            }
            else
            {
                $('.primary-text').show(0);
                $('.title-container').css("position","fixed");


            }
            if ($(this).scrollTop()>320)
            {
                $('.secondary-text').hide(0);
            }
            else
            {
                $('.secondary-text').show(0);
            }
        });
    </script>

    <style>

        body{background-color: white}
        .home-main{
            min-height: 95vh;
            height: auto;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-attachment: fixed;
            {{--background: rgb(17, 171, 251) url('{{asset('images/background/hostel.jpg')}}');--}}
            {{--background-size: cover;--}}
            {{--background-repeat: no-repeat;--}}
            {{--background-blend-mode: revert;--}}
            background-image:
                linear-gradient(rgb(17, 171, 251,0.8), rgb(17, 171, 251,0.8)),
                url('{{asset('images/background/hostel.jpg')}}');
        }
    </style>
{{--@endsection--}}


