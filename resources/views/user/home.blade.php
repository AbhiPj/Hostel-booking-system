
@extends('layouts.user')

@section('content')


    <section>
        <div class="home-main">
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
{{--                    <div class="col-md-3" style="margin-left: 450px">--}}
{{--                        <input style="width: 105%; margin-top: 10px" class="search-box" placeholder="" type="type" name="2">--}}
{{--                    </div>--}}
                    <div style="margin-left: 520px" class="col-md-6">
{{--                        <button class="btn btn-dark">Book Now</button>--}}
                        <a  class="read_more" href="#hostel-main">See More</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>

</section>

<div id="hostel-main" class="hostel-main">
    <div class="hostel-container">
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
                            <figure><img src="{{asset('images/background/1.jpg')}}" alt="#" /></figure>
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
                    <figure><img src="{{asset('images/background/4.jpg')}}" alt="#" /></figure>
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
        $(window).scroll(function() {
            if ($(this).scrollTop()>250)
            {
                $('.myDiv').hide(1000);
            }
            else
            {
                $('.myDiv').show(1000);
            }
        });
    </script>
    <div class="myDiv">
        <ul>
            <li>Arunachal Pradesh</li>
            <li>Himachal Pradesh</li>
            <li>Uttar Pradesh</li>
            <li>Madhya Pradesh</li>
            <li>Andhra Pradesh</li>
        </ul>
    </div>

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
            }
            else
            {
                $('.primary-text').show(0);
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
    <div class="myDiv">
        <ul>
            <li>Arunachal Pradesh</li>
            <li>Himachal Pradesh</li>
            <li>Uttar Pradesh</li>
            <li>Madhya Pradesh</li>
            <li>Andhra Pradesh</li>
        </ul>
    </div>
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
        @media only screen and (max-device-width: 1366px) {
            .home-main {
                /*background-attachment: scroll;*/
            /*background-size: cover;*/
            /*    background-position: center;*/


            }
        }


        .title-container{
            /*background-color: #0a53be;*/
            min-height: 50vh;
            width: 60%;
            display: flex;
            flex-direction: column;
            align-items: center;
            position: fixed;


        }
        .primary-text{
            /*width: 100%;*/
            color: white;
            font-size: 50px;
            line-height: 50px;
            padding-bottom: 15px;
            font-weight: bold;
            text-transform: uppercase;
            font-family:Calibri;
        }
        .secondary-text{
            /*width: 100%;*/
            margin-top: 10px;
            font-size: 45px;
            line-height: 50px;
            font-weight: bold;
            padding-bottom: 20px;
            display: block;
            color: white;
            font-family:Calibri;

        }
        .long-text{
            /*width: 100%;*/
            font-size: 17px;
            line-height: 28px;
            padding-bottom: 60px;
            color: white;
            margin-top: 50px;
        }

        .form_book{
            width: 90%;
            animation: transitionUp 0.5s;

            margin: auto;
            background-color: white;
            margin-top: -110px;
            border-radius: 40px 40px 0px 0px;
            padding: 70px 8px 15px 60px;

        }
        .search-container{
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }
        .search-box{
            border-radius: 20px;
            background-color: #eeeeee;
            height: 40px;

        }


        .about {
            background: #353e4e;
            margin-top: 60px;
            padding: 90px 0;
        }
        .titlepage h2 {
            font-size: 55px;
            color: #313131;
            line-height: 60px;
            font-weight: bold;
            padding: 0;
        }
        .about .titlepage h2{
            color: #fff;
            margin-bottom: 20px;
        }

        .about .titlepage p {
            color: #fff;
            font-size: 17px;
            line-height: 28px;
            font-weight: 500;
            padding-bottom: 30px;
        }
        .hostel-main{
            margin-top: 100px;
        }
        .hostel-container{
            width: 100%;
            padding-right: 100px;
            padding-left: 100px;
            margin: auto;
        }
        .choose_box{
            padding-top: 70px;
        }
        .our_box {
            text-align: right;
        }
        .our_box p {
            font-size: 17px;
            line-height: 36px;
            color: #313131;
            padding: 0px 0px 40px 0px;
        }
        .our_box .titlepage {
            text-align: right;
            padding-bottom: 30px;
        }
        .container-fl{
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }


        .choose_box .titlepage{
            text-align: left;
            padding-top: 35px;
        }
        .text_norlam{
            font-weight: normal;
        }
        .titlepage h2{
            font-size: 55px;
            color: #313131;
            line-height: 60px;
        }
        .choose_box p {
            font-size: 17px;
            line-height: 36px;
            color: #313131;
            padding: 0px 0px 45px 0px;
        }
        .read_more {
            font-size: 17px;
            text-decoration: none;
            background-color: #000;
            color: #fff;
            padding: 13px 0px;
            width: 100%;
            max-width: 190px;
            text-align: center;
            display: inline-block;
            transition: ease-in all 0.5s;
            border-radius: 10px;
        }
        .home-btn {
            font-size: 17px;
            text-decoration: none;
            background-color: #fff;
            color: black;
            padding: 13px 0px;
            width: 100%;
            max-width: 190px;
            text-align: center;
            display: inline-block;
            /*transition: ease-in all 0.5s;*/
            border-radius: 10px;
            border: none;
        }
        .img_box {
            margin-bottom: 30px;
            width: 100%;
            overflow:hidden;
        }

        .title-container h1{
            /*color: black;*/
            font-size: 50px;
            line-height: 50px;
            padding-bottom: 15px;
            font-weight: bold;
            text-transform: uppercase;
        }
        @keyframes transitionUp {
            from {
                transform: translateY(100px);


            }
            to {
                /*transform: translateX(10px);*/
                /*margin: auto;*/
            }
        }



    </style>
@endsection


