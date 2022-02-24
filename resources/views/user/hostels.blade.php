@extends('layouts.user.user')

@section('content')

    <div style="height: 50vh;overflow-y: hidden" class="hostel-top-img">
        <div class="center-cropped">
        </div>
    </div>


<div class="hostel-search">
    <div class="search-holder">

        <input class="search-box" placeholder="Seach">

    </div>
</div>

    <div class="hostel-container">
        <div class="hostel-item">
            <div class="hostel-img">

            </div>
            <div class="hostel-details">
                <h2>Hostel Name</h2>
                <p style="font-size: 10px; margin-left: 3px">location</p>
                <p style="font-size: 12px">
                    Find yourself with nowhere to go? Hoste_Name has got you covered.
                    It has a place for everyone. Doors are open to anyone that wishes to join us. Together lets make this place a home.
                </p>
                <div class="hostel-price">
                    <p>Price: 2000</p>
                </div>

            </div>
            <div class="hostel-ratings">
                <a  class="read_more" href="/user/rooms/1">View</a>
            </div>
        </div>
        <div class="hostel-item">

        </div>
    </div>



<script>
    $(document).ready(function() {
        $('.multi-select').select2();
    });
</script>
    <style>
        .multi-select{
            width: 100%;
            border-radius: 10px;

        }

        p, h2{
            /*color: #313131;*/
            /*color: grey;*/
            color: black;
        }

        p{
            color: grey;

        }

        .search-holder{
            width: 90%;
            height: 50px;
            justify-content: center;
            align-items: center;
            display: flex;
            margin-top: 100px;
            margin: auto;

        }
        .search-box{
            width: 100%;
            height: 100%;
            border-radius: 10px;
            border: grey solid 1px;

        }

        .center-cropped {
           height: 100vh;
            max-width: 100%;
            /*background-position: center center;*/
            background-repeat: no-repeat;
            background-size: cover;
            background-position: 10% 90%;
            background-image: url('{{asset('images/background/00.jpg')}}');

        }
        .hostel-top-img{
            width: 95%;
            margin-left: 35px;
            vertical-align: middle;
            height: 40vh;
            /*background-color: black;*/
            animation: transitionIn 1s;
            border-radius: 10px;
            box-shadow: 0 5px 10px rgb(0 0 0 / 10%);


        }

        @keyframes transitionIn {
            from {
                margin-top: 5vh;
                width: 42%;
                margin-left: 52%;
                height: 95vh;

            }
            to {
                /*transform: translateX(10px);*/
                /*margin: auto;*/
            }
        }
        .hostel-container{
            display: flex;
            flex-direction: column;
        }
        .hostel-item{
            width: 90%;
            margin: auto;
            min-height: 40vh;
            margin-top: 20px;
            background-color: white;
            box-shadow: 0 5px 10px rgb(0 0 0 / 10%);
            border-radius: 10px;
            padding:20px;
            display: flex;
            flex-wrap: wrap;


        }
        .hostel-img{
            background-color: black;
            height: 40vh;
            /*height: 100%;*/
            box-shadow: 0 5px 10px rgb(0 0 0 / 10%);

            width: 400px;
            border-radius: 10px;
        }

        .hostel-search{
            width: 95%;
            height: 50vh;
            display: flex;
            padding: 20px;
            flex-direction: column;
            box-shadow: 0 5px 10px rgb(0 0 0 / 10%);
            border-radius: 10px;
            margin: 10px auto auto;
            background-color: white;

        }
        .hostel-details{
            /*background-color: blue;*/
            box-shadow: 0 5px 10px rgb(0 0 0 / 10%);
            height: 40vh;
            width: 650px;
            border-radius: 10px;
            margin-left: 10px;
            padding: 10px;
        }
        .hostel-ratings{
            background-color: darkcyan;
            box-shadow: 0 5px 10px rgb(0 0 0 / 10%);
            height: 40vh;
            width: 250px;
            border-radius: 10px;
            margin-left: 10px;
            padding: 10px;
        }

        @media only screen and (max-device-width: 1366px) {
            .hostel-price {
                margin-top: 10px;
                /*background-color: blue;*/
            }
            .hostel-details{
                height: auto;
            }
        }

        /*@media only screen and (max-width: 520px) {*/
        /*    .hostel-price {*/
        /*        margin-top: 0;*/
        /*        !*background-color: blue;*!*/
        /*    }*/
        /*    .hostel-details{*/
        /*        height: auto;*/
        /*    }*/
        /*}*/
        .hostel-price{
            margin-top: 100px;
        }
        .read_more {
            height: 40px;
            font-size: 17px;
            text-decoration: none;
            background-color: #000;
            color: #fff;
            padding:7px;
            width: 100%;
            /*max-width: 190px;*/
            text-align: center;
            display: inline-block;
            margin-top: 210px;
            transition: ease-in all 0.5s;
            border-radius: 10px;
        }

    </style>



@endsection
