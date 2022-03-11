@extends('layouts.admin.admin')

@section('content')

    <div class="booking-details-container">

        <p>{{$room->roomName}}</p>
        <div class="booking-details-table">
            <ul>
                <li>Booking ID:</li>
                <li>Booking made by:</li>
                <li>Phone:</li>
                <li>Payment Method:</li>
                <li>Price:</li>
                <li>User Name:
                <li>User email:</li>


            </ul>
            <ul style="margin-left: 30px">
                <li>{{$bookingDetails->id}}</li>
                <li>{{$bookingDetails->firstName}} {{ $bookingDetails->lastName}}</li>
                <li>{{$bookingDetails->phoneNumber}}</li>
                <li>{{$payment->paymentMethod}}</li>
                <li>{{$payment->price}}</li>
                <li>{{$user->name}}</li>
                <li>{{$user->email}}</li>


            </ul>
        </div>







    </div>




    <style>
        .booking-details-container{
            background: #fff;
            padding: 20px 30px;
            margin: 0 20px;
            border-radius: 12px;
            box-shadow: 0 5px 10px rgb(0 0 0 / 10%);
        }
        li{
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 10px 0;
        }
    </style>
@endsection()
