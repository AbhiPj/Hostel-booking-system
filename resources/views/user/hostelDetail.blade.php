
@extends('layouts.user.user')

@section('content')
    <link rel="stylesheet" type="text/css" href="./style.css" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/ratingbar.css')}}" />
    <div class="content">
        <script>
            function initMap() {
                // The location of Uluru
                const kathmandu = { lat: {{$hostel->latitude}}, lng: {{$hostel->longitude}} };
                // The map, centered at Uluru
                const map = new google.maps.Map(document.getElementById("map"), {
                    zoom: 10,
                    center: kathmandu,
                });

                let makar = new google.maps.Marker({
                    position: kathmandu,
                    map: map,
                });
                marker.setMap(map);
            }
        </script>
        <div class="slideshow-container">

{{--            Displaying primary Image--}}
                <div class="mySlides">
                    <div class="numbertext">1 / 3</div>
                    <img src="{{ asset('images/' . $hostel['primaryImg']) }}">
{{--                    <div class="text">Caption Text</div>--}}
                </div>

{{--            Displaying additional images--}}
            @foreach (explode(',', $hostel['additionalImages']) as $image)
                <div class="mySlides">
                    <div class="numbertext">1 / 3</div>
                    <img src="{{ asset('images/' . $image) }}">
                    {{--                    <div class="text">Caption Text</div>--}}
                </div>
            @endforeach
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <div class="hostel-nav">
            <a href="#">Features</a>
            <a href="#">Description</a>
            <a href="#">Amenities</a>
            <a href="#">Rooms</a>
            <a href="#">Reviews</a>
            <a href="/user/messages/{{$hostel->userId}}">Message</a>
            <a href="/user/appointment/{{$hostel->id}}">Appointment</a>



        </div>

        <div style="display: flex; width: 90%; margin: auto">
            <div class="room-info">
                <h2 style="margin: auto">{{$hostel->hostelName}}</h2>
                <p style="margin-top: 30px;font-size: 13px;width: 95%">{{$hostel->about}}asdf asfa sdf asd fa sdf asd f asdf as fd asd fd  dsfasdf asdf
                asdfasdfa asdfasdfaf asdfasdfa asdfasdfa sdfasfa sdfa sdf asfasdf asd sdf asdf asfa sdf asd fa sdf asd f asdf as fd asd fd  dsfasdf asdf
                    asdfasdfa asdfasdfaf asdfasdfa asdfasdfa sdfasfa sdfa sdf asfasdf asd sdf</p>
                <br>
                <h2>Features</h2>
                <ul class="feature-container">
                    @foreach($featureArr as $item)
                        <li class="feature-item">{{$item}}</li>
                    @endforeach
                        @foreach($featureArr as $item)
                            <li class="feature-item">{{$item}}</li>
                        @endforeach
                        @foreach($featureArr as $item)
                            <li class="feature-item">{{$item}}</li>
                        @endforeach

                </ul>
            </div>
            <div class="room-info-second">
<h2> Location</h2>
                <div id="map"></div>
                <script
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDLHJrMCWUn3MaoEKRnW0Y0rD22yU6Rp7I&callback=initMap&libraries=&v=weekly&channel=2"
                    async
                ></script>
            </div>
        </div>
    </div>


    <section>
        <div>
            <div style="text-align: center; color: grey">
                <div class="mainRoom">
{{--                    <h2 style="font-weight: normal">Rooms</h2>--}}

                    {{--                    <div style="text-align: center">--}}
{{--                        <h1 style="margin-top: 20px; color:#313d59">Rooms</h1>--}}
{{--                    </div>--}}
                    <div class="roomContainer">
                        @foreach($rooms as $rooms)
                                <div class="blog-post">
                                    <div class="blog-content">
                                        <div class="blog-title">
                                            <div class="roomPost">
                                                <div class="roomContent">
                                                    <img class="roomImg" src="{{asset('images/' . $rooms['primaryImg'])}}" alt="post-1">
                                                    <div class="roomTitle">
                                                        <h3 style="color: #313d59">{{$rooms->roomName}}</h3>
                                                        <p style="font-size: 12px">{{$rooms->about}}</p>
    {{--                                                    <a href="/user/rooms/{{$rooms->id}}" class="btn btn-blog">View</a>--}}
    {{--                                                    <p>{{$rooms->about}}</p>--}}
                                                        @if($rooms->roomStatus === "available")
                                                            <a href="/user/rooms/payment/{{$rooms->id}}" class="btn btnRoom"  >Book this room</a>
                                                        @else
                                                            <a class="btn btnRoom"  >Unavailable</a>
                                                        @endif
                                                            <span>{{$rooms->price}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div>
{{--        <div class="user-review">--}}

{{--        </div>--}}
        <div style="display: flex; width: 94%; margin: auto;padding:10px">
            <div style="width: 30%;margin-right: 20px" class="room-info-second">
                <h2> Ratings</h2>
                <div class="ratings-container">
                    <h2 style="font-size: 55px">4.5</h2>
                    <div style="margin-left: 10px; margin-top: 10px ">
                        <h2>Wonderful</h2>
                        <p>2222 reviews</p>
                    </div>
                </div>
                <div>
{{--                    <script type="text/javascript" src="jquery-1.4.2.min.js"></script>--}}
                    <script type="text/javascript" src="{{ asset('js/jquery.ratingbar.js') }}"></script>
                    <script type="text/javascript" charset="utf-8">
                        $(document).ready(function () {
                            $('.movie_rating').ratingbar();
                        });
                    </script>

                    <table id="movies" style="margin: auto">
                        <tr>
                            <td>5 Stars</td>
                            <td class="movie_rating">70</td>
                        </tr>
                        <tr>
                            <td>4 Stars</td>
                            <td class="movie_rating">22</td>
                        </tr>
                        <tr>
                            <td>3 Stars</td>
                            <td class="movie_rating">22</td>
                        </tr>
                        <tr>
                            <td>2 Stars</td>
                            <td class="movie_rating">22</td>
                        </tr>
                        <tr>
                            <td>1 Star</td>
                            <td class="movie_rating">22</td>
                        </tr>
                    </table>
                </div>

            </div>

            <div style="width: 68%" class="room-info">
                <h2 style="margin: auto">Reviews</h2>
                <div >
                    <form action="/user/review/{{$hostel->id}}" method="POST">
                        @csrf
                        <textarea required name="reviewMessage" placeholder="Write a review..." style="border-radius: 10px; width: 60%;border: grey 1px solid; height: 150px; margin-top: 50px;margin-bottom: 30px;"></textarea>
                        <fieldset >
                            <span class="star-cb-group">
                              <input type="radio" id="rating-5" name="rating" value="5" />
                              <label for="rating-5">5</label>
                              <input type="radio" id="rating-4" name="rating" value="4" />
                              <label for="rating-4">4</label>
                              <input type="radio" id="rating-3" name="rating" value="3" />
                              <label for="rating-3">3</label>
                              <input type="radio" id="rating-2" name="rating" value="2" />
                              <label for="rating-2">2</label>
                              <input type="radio" id="rating-1" name="rating" value="1" />
                              <label for="rating-1">1</label>
                              <input type="radio" id="rating-0" name="rating" value="0" class="star-cb-clear" />
                              <label for="rating-0">0</label>
                            </span>
                        </fieldset>
                        <button style="margin-left: 60px" type="submit" class="search-button">submit</button>
                    </form>


                    <hr>
                    @foreach($reviews as $review)
                        <div>
                            @foreach($users as $user)
                                @if($user->id == $review->userId )
                                    <p class="user-review-name">{{$user->name}}</p>
                                    <p class="user-review-message">{{$review->review}}</p>

                                @endif
                            @endforeach
                            <p style="font-size: 10px;color: grey">2022/03/19</p>
                            <hr>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>

    </div>


    <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            if (n > slides.length) {slideIndex = 1}
            if (n < 1) {slideIndex = slides.length}
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";
            dots[slideIndex-1].className += " active";
        }
    </script>


    <style>

        .star-cb-group {
            /* remove inline-block whitespace */
            font-size: 0;
            /* flip the order so we can use the + and ~ combinators */
            unicode-bidi: bidi-override;
            direction: rtl;
            /* the hidden clearer */
        }
        .star-cb-group * {
            font-size: 3rem;
        }
        .star-cb-group > input {
            display: none;
        }
        .star-cb-group > input + label {
            /* only enough room for the star */
            display: inline-block;
            overflow: hidden;
            text-indent: 9999px;
            width: 1em;
            white-space: nowrap;
            cursor: pointer;
        }
        .star-cb-group > input + label:before {
            display: inline-block;
            text-indent: -9999px;
            content: "☆";
            color: #888;
        }
        .star-cb-group > input:checked ~ label:before, .star-cb-group > input + label:hover ~ label:before, .star-cb-group > input + label:hover:before {
            content: "★";
            color: #e52;
            text-shadow: 0 0 1px #333;
        }
        .star-cb-group > .star-cb-clear + label {
            text-indent: -9999px;
            width: .5em;
            margin-left: -.5em;
        }
        .star-cb-group > .star-cb-clear + label:before {
            width: .5em;
        }
        .star-cb-group:hover > input + label:before {
            content: "☆";
            color: #888;
            text-shadow: none;
        }
        .star-cb-group:hover > input + label:hover ~ label:before, .star-cb-group:hover > input + label:hover:before {
            content: "★";
            color: #e52;
            text-shadow: 0 0 1px #333;
        }

        .rating {
            unicode-bidi: bidi-override;
            direction: rtl;
            text-align: center;
        }
        .rating > span:hover:before,
        .rating > span:hover ~ span:before {
            content: "\2605";
            position: absolute;
            left: 0;
            color: gold;
        }
        .rating > span {
            display: inline-block;
            position: relative;
            width: 1.1em;
        }
        .rating > span:hover,
        .rating > span:hover ~ span {
            color: transparent;
        }
        /*-------------------User Review Style start--------------------*/


        .user-review-name{
            margin-top: 40px;
            font-weight: bold;
            font-size: 18px;
        }

        .user-review-message{
            font-size: 14px;
        }


        .user-review{
            display: flex;
            flex-wrap: wrap;
            width: 90%;
            margin: auto;
            border-radius: 10px;
            min-height: 30vh;
            height: auto;
            box-shadow: 0 5px 10px rgb(0 0 0 / 10%);
            background-color: white;
            margin-top: 20px;
        }

        /*--------------User Review style end---------------*/


        /*-------------------User Ratings style start---------------*/

        .ratings-container{
            display:flex;
        }

        .ratings-container p{
            margin-bottom: 5px;
            font-size: 11px;
        }

        .ratings-container h2{
            font-weight: bold;
            font-size: 18px;
        }








        /*--------------------User Ratings style end----------------*/
        .feature-container{
            list-style-type: disc;
            display: flex;
            flex-wrap: wrap;
            flex-direction: column;
            height: 30vh;
        }
        .feature-item{
            margin-top: 15px;
        }
        #map {
            border-radius: 10px;
            margin-top: 20px;
            height: 90%;
        }
        .hostel-nav{
            width: 90%;
            margin: auto;
            display: flex;
            flex-wrap: wrap;
            min-height: 8vh;
            height: auto;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 5px 10px rgb(0 0 0 / 10%);
            margin-top: 20px;
            padding: 20px;
        }

        .hostel-nav a{
            text-decoration: none;
            margin-right: 45px;
        }

        p, h2,li,a,h1,h3{
            color: #313131;
            font-family: Nunito;
        }

        .room-info h2{
            font-weight: normal;
        }

        .room-info-second h2{
            font-weight: normal;
        }

        h2{
            font-weight: bold;
        }
        .content{
            height: auto;
            min-height: 100vh;
            width: 100%;
            margin: auto;
        }
        * {box-sizing: border-box}
        body {font-family: Verdana, sans-serif; margin:0}
        .mySlides {
            display: none;
            height: 65vh;
            overflow: hidden;
            box-shadow: 0 5px 10px rgb(0 0 0 / 10%);
            border-radius: 10px;

        }
        img {
            vertical-align: middle;
            width: 100%;
            /*height: 70vh;*/
            display: block;
            margin-left: auto;
            margin-right: auto;

        }

        /* Slideshow container */
        .slideshow-container {
            /*max-width: 1000px;*/
            width: 95%;
            margin-left: 35px;
            position: relative;
            margin: auto;
            box-shadow: 0 5px 10px rgb(0 0 0 / 10%);
            border-radius: 10px;


        }

        /* Next & previous buttons */
        .prev, .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            padding: 16px;
            margin-top: -22px;
            color: white;
            font-weight: bold;
            font-size: 18px;
            transition: 0.6s ease;
            border-radius: 0 3px 3px 0;
            user-select: none;
        }

        /* Position the "next button" to the right */
        .next {
            right: 0;
            border-radius: 3px 0 0 3px;
        }

        /* On hover, add a black background color with a little bit see-through */
        .prev:hover, .next:hover {
            background-color: rgba(0,0,0,0.8);
        }

        /* Caption text */
        .text {
            color: #f2f2f2;
            font-size: 15px;
            padding: 8px 12px;
            position: absolute;
            bottom: 8px;
            width: 100%;
            text-align: center;
        }

        /* Number text (1/3 etc) */
        .numbertext {
            color: #f2f2f2;
            font-size: 12px;
            padding: 8px 12px;
            position: absolute;
            top: 0;
        }

        .room-info{
            background-color: white;
            box-shadow: 0 5px 10px rgb(0 0 0 / 10%);
            border-radius: 10px;
            width: 58%;
            height: auto;
            min-height: 90vh;
            margin-top: 20px;
            border-radius: 5px;
            padding:20px;
        }

        .room-info-second{
            background-color: white;
            box-shadow: 0 5px 10px rgb(0 0 0 / 10%);
            border-radius: 10px;
            margin-top: 20px;
            width: 40%;
            margin-left: 20px;
            border-radius: 5px;
            padding:20px;

        }
        /* The dots/bullets/indicators */
        .dot {
            cursor: pointer;
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
        }

        .active, .dot:hover {
            background-color: #717171;
        }

        /* Fading animation */
        .fade {
            -webkit-animation-name: fade;
            -webkit-animation-duration: 1.5s;
            animation-name: fade;
            animation-duration: 1.5s;
        }

        @-webkit-keyframes fade {
            from {opacity: .4}
            to {opacity: 1}
        }

        @keyframes fade {
            from {opacity: .4}
            to {opacity: 1}
        }

        /* On smaller screens, decrease text size */
        @media only screen and (max-width: 300px) {
            .prev, .next,.text {font-size: 11px}
        }
    </style>
@endsection
