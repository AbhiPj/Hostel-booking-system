@extends('layouts.admin.admin')

@section('content')

    <div class="booking-details-container">

        <h2>{{$room->roomName}}</h2>
        <p>Booking ID:  {{$bookingDetails->id}}</p>

        <p>Booking made by:  {{$bookingDetails->firstName}} {{ $bookingDetails->lastName}}</p>
        <p>Phone:  {{$bookingDetails->phoneNumber}}</p>

        <p>Payment Method: {{$payment->paymentMethod}}
        <p>Price: {{$payment->price}}</p>





    </div>




    <style>
        .booking-details-container{
            background: #fff;
            padding: 20px 30px;
            margin: 0 20px;
            border-radius: 12px;
            box-shadow: 0 5px 10px rgb(0 0 0 / 10%);
        }
    </style>
@endsection()
