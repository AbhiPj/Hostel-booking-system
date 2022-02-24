@extends('layouts.admin.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
{{--                <div class="card-header">{{ __('Dashboard') }}</div>--}}
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
{{--                    {{ __('You are logged in!') }}--}}
{{--                        <a href="{{ route('rooms.create') }}">rooms</a>--}}
                                <div class="overview-boxes">
                                    <div class="box">
                                        <div class="right-side">
                                            <div class="box-topic">Total Booking</div>
                                            <div class="number">{{$totalBooking}}</div>
                                        </div>
                                        <i class='bx bx-cart-alt cart'></i>
                                    </div>
                                    <div class="box">
                                        <div class="right-side">
                                            <div class="box-topic">Total Earning</div>
                                            <div class="number">{{$totalPrice}}</div>
                                        </div>
                                        <i class='bx bxs-cart-add cart two'></i>
                                    </div>
                                </div>

                        @foreach($booking as $b)

                        @endforeach

                    <div class="sales-boxes">
                        <div class="recent-sales box">
                            <div class="title">Recent Bookings</div>
                            <div class="sales-details">

                                    <ul class="details">
                                        <li class="topic">Date</li>
                                        @foreach($booking as $b)
                                        <li>{{$b->created_at}}</li>
                                        @endforeach
                                    </ul>

                                    <ul class="details">
                                        <li class="topic">ID</li>
                                        @foreach($booking as $b)
                                            <li>{{$b->id}}</li>
                                        @endforeach                                    </ul>
                                    <ul class="details">
                                        <li class="topic">Sales</li>
                                        @foreach($booking as $b)
                                            <li>02 Jan 2021</li>
                                        @endforeach
                                    </ul>
                                    <ul class="details">
                                        <li class="topic">Total</li>
                                        @foreach($booking as $b)
                                            <li>02 Jan 2021</li>
                                        @endforeach
                                    </ul>


                            </div>
                            <div class="button">
                                <a href="#">See All</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
