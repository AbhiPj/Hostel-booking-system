<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body style="overflow: hidden; height: 100%">
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
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
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
        </div>
    </nav>
    <main>
        <div class="mainContent">
            <div class="contentHolder">
                <div class="sidenav">
                    <a href="#about">About</a>
                    <a href="#services">Services</a>
                    <a href="#clients">Clients</a>
                    <a href="#contact">Contact</a>
                </div>
<div style="overflow-y: scroll;height: 90vh;width: 100%">
    @yield('content')
</div>
            </div>
        </div>
    </main>

</div>
</body>



<style>
    .button{
        text-decoration: none;
        color: #111;
        border: 2px solid;
        padding: 8px;
        border-radius: 5px;
    }
    .myImg {
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
        height: 100px;
        width: 100px;
    }
    .myImg:hover {
        opacity: 0.7;
    }
    /* The Modal (background) */
    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
    }

    /* Modal Content (image) */
    .modal-content {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
    }
    .close {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
    }

    .close:hover,
    .close:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
    }
    .imgStyle{
        width: 30%;
    }
    .mainContent{
        /*background-color: #6a1a21;*/
        min-height: 100vh;
        height: auto;
        display: flex;
    }

    .sidenav {
        height: 100vh;
        width: 280px;
        background-color: #111;
        overflow-x: hidden;
        padding-top: 20px;
        /*position: fixed;*/
    }

    .sidenav a {
        padding: 6px 8px 6px 16px;
        text-decoration: none;
        font-size: 25px;
        color: #818181;
        display: block;
    }
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 80%;
        background-color: white;
        padding-bottom: 30px;
        margin: auto;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
    .sidenav a:hover {
        color: #f1f1f1;
    }

    body{
        margin: 0;
        padding: 0;
    }
    .formContainer{
        width: 100%;
        /*display: flex;*/
        justify-content: center;
        margin-bottom: 10px;
        /*flex-direction: column;*/
    }

    .contentHolder{
        display: flex;
        min-width: 100%;

    }
    #images{
        width: 50%;
        position: relative;
        /*margin: auto;*/
        display: flex;
        justify-content: space-evenly;
        /*gap: 20px;*/
        flex-wrap: wrap;
        overflow: scroll;
        height: 200px;
        /*background-color: white;*/
    }
    figure{
        width: 35%;
    }
    img{
        width: 100%;
    }
</style>

<script>
    let fileInput = document.getElementById("roomImg");
    let fileInput2 = document.getElementById("primaryImg");

    let imageContainer = document.getElementById("images");
    let imageContainer2 = document.getElementById("images2");


    function preview(){
        imageContainer.innerHTML = "";

        for(i of fileInput.files){
            let reader = new FileReader();
            let figure = document.createElement("figure");
            let figCap = document.createElement("figcaption");
            figCap.innerText = i.name;
            figure.appendChild(figCap);
            reader.onload=()=>{
                let img = document.createElement("img");
                img.setAttribute("src",reader.result);
                figure.insertBefore(img,figCap);
            }
            imageContainer.appendChild(figure);
            reader.readAsDataURL(i);
        }
    }

    function preview2(){
        imageContainer2.innerHTML = "";

        for(i of fileInput2.files){
            let reader = new FileReader();
            let figure = document.createElement("figure");
            let figCap = document.createElement("figcaption");
            figCap.innerText = i.name;
            figure.appendChild(figCap);
            reader.onload=()=>{
                let img = document.createElement("img");
                img.setAttribute("src",reader.result);
                figure.insertBefore(img,figCap);
            }
            imageContainer2.appendChild(figure);
            reader.readAsDataURL(i);
        }
    }

    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    // var img = $(".myImg");
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    function image(event)  {
        modal.style.display = "block";
        modalImg.src = event.target.src;
        captionText.innerHTML = event.target.alt;
    }

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
    }
</script>
</html>
