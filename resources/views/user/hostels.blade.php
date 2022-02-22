@extends('layouts.user')

@section('content')


    <div style="height: 50vh;overflow-y: hidden" class="test">
        <div class="center-cropped">
{{--            <+img style="width: 100%;vertical-align: center;height: 100vh" src="{{asset('images/background/1.jpg')}}" alt="#" /></div>--}}
        </div>
    </div>

    <div class="hostel-container">
        <div class="hostel-item">

        </div>
        <div class="hostel-item">

        </div>
    </div>




    <style>
        .center-cropped {
           height: 100vh;
            max-width: 100%;
            /*background-position: center center;*/
            background-repeat: no-repeat;
            background-size: cover;
            background-position: 10% 90%;
            background-image: url('{{asset('images/background/1.jpg')}}');

        }
        .test{
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
        }
    </style>



@endsection
