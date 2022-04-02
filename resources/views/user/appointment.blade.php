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
        <a style="font-size: 20px;color: white" class="navbar-brand" href="{{ url('/') }}">
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
    <div class="mobile-background">
        <div class="mobile-container">
            <div class="mobile-form-container">
                <h2 style="margin-bottom: 20px">Appointment</h2>
                <form action="/user/appointment/{{$id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label for="appointmentDate" class="form-label">Date</label>
                    <input name="appointmentDate" type="date" class="form-control" id="appointmentDate">
                    <label for="appointmentMessage" style="margin-top: 20px" class="form-label">Leave a Message:</label>
                    <textarea id="appointmentMessage" style="height: 20vh" name="appointmentMessage" class="form-control"></textarea>
                    <button type="submit" class="form-control mt-5">Submit</button>
                </form>
            </div>
        </div>
    </div>


{{--@endsection()--}}
