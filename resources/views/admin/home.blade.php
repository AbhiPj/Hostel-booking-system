@extends('layouts.admin.admin')

@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
{{--                                    <div class="box">--}}
{{--                                        <div class="right-side">--}}
{{--                                            <div class="box-topic">Total Earning from bookings</div>--}}
{{--                                            <div class="number">{{$totalPrice}}</div>--}}
{{--                                        </div>--}}
{{--                                        <i class='bx bxs-cart-add cart two'></i>--}}
{{--                                    </div>--}}
                                    <div class="box">
                                        <div class="right-side">
                                            <div class="box-topic">Earning this month</div>
                                            <div class="number">{{$customerMonthSum}}</div>
                                        </div>
                                        <i class='bx bxs-cart-add cart two'></i>
                                    </div>
                                    <div class="box">
                                        <div class="right-side">
                                            <div class="box-topic">Customers this month</div>
                                            <div class="number">{{$countCustomers}}</div>
                                        </div>
                                        <i class='bx bxs-cart-add cart two'></i>
                                    </div>
                        </div>

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
                                        @endforeach
                                    </ul>
                                    <ul class="details">
                                        <li class="topic">Price</li>
                                        @foreach($booking as $b)
                                            <li>{{$b->price}}</li>
                                        @endforeach
                                    </ul>
                                    <ul class="details">
                                        <li class="topic">Payment Method</li>
                                        @foreach($booking as $b)
                                            <li>{{$b->paymentStatus}}</li>
                                        @endforeach
                                    </ul>


                            </div>
                            <div class="button" style="border: none">
                                <a href="#">See All</a>
                            </div>
                        </div>

                    </div>

                    <div class="sales-boxes">
                            <div class="recent-sales box" style="width: 40%; margin-top: 20px">
                                <div class="title">Available Rooms</div>
                                <div class="sales-details">

                                    <ul class="details">
                                        <li class="topic">Date</li>
                                        @foreach($availableRooms as $ar)
                                            <li>{{$ar->created_at}}</li>
                                        @endforeach
                                    </ul>

                                    <ul class="details">
                                        <li class="topic">ID</li>
                                        @foreach($availableRooms as $ar)
                                            <li>{{$ar->id}}</li>
                                        @endforeach                                    </ul>
                                    <ul class="details">
                                        <li class="topic">Rooms</li>
                                        @foreach($availableRooms as $ar)
                                            <li>{{$ar->roomName}}</li>
                                        @endforeach
                                    </ul>


                                </div>
                                <div class="button" style="border: none">
                                    <a href="#">See All</a>
                                </div>
                            </div>

                        </div>

{{--                    <div class="chart-container">--}}
{{--                        <canvas id="myChart" width="100" height="50"></canvas>--}}
{{--                        <script>--}}
{{--                            var sites = {!! json_encode($date) !!};--}}
{{--                            var sites2 = {!! json_encode($total) !!};--}}

{{--                            //storing date in array--}}
{{--                            date = [];--}}
{{--                            for (const [key, value] of Object.entries(sites)) {--}}
{{--                                date.push(value.date);--}}
{{--                            }--}}
{{--                            console.log(date,"date log");--}}

{{--                            //storing total in array--}}
{{--                            total = [];--}}
{{--                            for (const [key, value] of Object.entries(sites2)) {--}}
{{--                                total.push(value.total);--}}
{{--                            }--}}
{{--                            console.log(total,"total log ");--}}

{{--                            //chart--}}
{{--                            const ctx = document.getElementById('myChart').getContext('2d');--}}
{{--                            const myChart = new Chart(ctx, {--}}
{{--                                type: 'bar',--}}
{{--                                data: {--}}
{{--                                    labels: date,--}}
{{--                                    datasets: [{--}}
{{--                                        label: 'Number of bookings',--}}
{{--                                        data: total,--}}
{{--                                        backgroundColor: [--}}
{{--                                            'rgba(255, 99, 132, 0.2)',--}}
{{--                                            'rgba(54, 162, 235, 0.2)',--}}
{{--                                            'rgba(255, 206, 86, 0.2)',--}}
{{--                                            'rgba(75, 192, 192, 0.2)',--}}
{{--                                            'rgba(153, 102, 255, 0.2)',--}}
{{--                                            'rgba(255, 159, 64, 0.2)'--}}
{{--                                        ],--}}
{{--                                        borderColor: [--}}
{{--                                            'rgba(255, 99, 132, 1)',--}}
{{--                                            'rgba(54, 162, 235, 1)',--}}
{{--                                            'rgba(255, 206, 86, 1)',--}}
{{--                                            'rgba(75, 192, 192, 1)',--}}
{{--                                            'rgba(153, 102, 255, 1)',--}}
{{--                                            'rgba(255, 159, 64, 1)'--}}
{{--                                        ],--}}
{{--                                        borderWidth: 1--}}
{{--                                    }]--}}
{{--                                },--}}
{{--                                options: {--}}
{{--                                    scales: {--}}
{{--                                        y: {--}}
{{--                                            beginAtZero: true--}}
{{--                                        }--}}
{{--                                    }--}}
{{--                                }--}}
{{--                            });--}}
{{--                        </script>--}}
{{--                    </div>--}}

{{--                    <div class="chart-container">--}}
{{--                            <canvas id="myChart2" width="100" height="50"></canvas>--}}
{{--                            <script>--}}
{{--                                var cdate = {!! json_encode($customerDate) !!};--}}
{{--                                var ctotal = {!! json_encode($customerTotal) !!};--}}

{{--                                //storing date in array--}}
{{--                                date2 = [];--}}
{{--                                for (const [key, value] of Object.entries(cdate)) {--}}
{{--                                    date2.push(value.cdate);--}}
{{--                                }--}}
{{--                                console.log(date,"cdate log");--}}

{{--                                //storing total in array--}}
{{--                                total2 = [];--}}
{{--                                for (const [key, value] of Object.entries(ctotal)) {--}}
{{--                                    total2.push(value.ctotal);--}}
{{--                                }--}}
{{--                                console.log(total2,"ctotal log ");--}}

{{--                                //chart--}}
{{--                                const ctx2 = document.getElementById('myChart2').getContext('2d');--}}
{{--                                const myChart2 = new Chart(ctx2, {--}}
{{--                                    type: 'bar',--}}
{{--                                    data: {--}}
{{--                                        labels: date2,--}}
{{--                                        datasets: [{--}}
{{--                                            label: 'Number of Checkins',--}}
{{--                                            data: total2,--}}
{{--                                            backgroundColor: [--}}
{{--                                                'rgba(255, 99, 132, 0.2)',--}}
{{--                                                'rgba(54, 162, 235, 0.2)',--}}
{{--                                                'rgba(255, 206, 86, 0.2)',--}}
{{--                                                'rgba(75, 192, 192, 0.2)',--}}
{{--                                                'rgba(153, 102, 255, 0.2)',--}}
{{--                                                'rgba(255, 159, 64, 0.2)'--}}
{{--                                            ],--}}
{{--                                            borderColor: [--}}
{{--                                                'rgba(255, 99, 132, 1)',--}}
{{--                                                'rgba(54, 162, 235, 1)',--}}
{{--                                                'rgba(255, 206, 86, 1)',--}}
{{--                                                'rgba(75, 192, 192, 1)',--}}
{{--                                                'rgba(153, 102, 255, 1)',--}}
{{--                                                'rgba(255, 159, 64, 1)'--}}
{{--                                            ],--}}
{{--                                            borderWidth: 1--}}
{{--                                        }]--}}
{{--                                    },--}}
{{--                                    options: {--}}
{{--                                        scales: {--}}
{{--                                            y: {--}}
{{--                                                beginAtZero: true--}}
{{--                                            }--}}
{{--                                        }--}}
{{--                                    }--}}
{{--                                });--}}
{{--                            </script>--}}
{{--                        </div>--}}


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
