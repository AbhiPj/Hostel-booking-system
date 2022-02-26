
@extends('layouts.user.user')

@section('content')
<link rel="stylesheet" href="{{asset('css/userHomeStyle.css')}}">


    <section>
        <div id="home-main" class="home-main">
                <div class="title-container">
                    <h1 class="primary-text">Welcome to Hostel Sansar</h1>

                    <h2 class="secondary-text">Landing Page</h2>
                    <p class="long-text">Here is some bullshit aboout some bullshit that is the farthest thing from the truth. Thanks!</p>
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
                            <input style="width: 105%; margin-top: 10px" class="search-box" placeholder="" type="type" name="2">
                        </div>
                        <div style="margin-left: 520px" class="col-md-6">
                            <button class="btn btn-dark">Book Now</button>
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
                        <h2><span class="text_norlam">Choose The Perfect</span> <br>Accommodation</h2>
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
                    <a class="read_more" href="#">Read More</a>
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
                        <h2>About Our Hostel</h2>
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
        <section>
            <div class="mainRoom">
                <div style="text-align: center">
                    <h1 style=" color:#313d59">Rooms</h1>
                </div>
                <div class="roomContainer">
                    @foreach($rooms as $rooms)
                        <div class="roomPost">
                            <div class="roomContent">
                                <img class="roomImg" src="{{asset('images/' . $rooms['primaryImg'])}}" alt="post-1">
                                <div class="roomTitle">
                                    <h3 style="color: #313d59">{{$rooms->roomName}}</h3>
                                    <p>{{$rooms->about}}</p>
                                    <a href="/user/rooms/{{$rooms->id}}" class="btn btnRoom">View</a>
                                    <span>{{$rooms->price}}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>



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
@endsection


