@extends('layouts.user.user')

@section('content')


    <div style="height: 50vh;overflow-y: hidden" class="hostel-top-img">
        <div class="center-cropped">
        </div>
    </div>


<div style="height: auto; min-height: 30vh" class="hostel-search">
    <form  action="/user/hostels/search" method="POST">
        @csrf
        <div class="search-holder">
            <input name="hostelSearch" class="search-box" placeholder="Seach">
        </div>
        <div class="search-button-container">
{{--            <a class="search-button" href="#">Search</a>--}}
            <button type="submit" class="search-button">Search</button>

        </div>

    </form>
{{--    <p style="margin-left: 10px">--}}
{{--        <a class="btn btn-dark" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">--}}
{{--            Filter--}}
{{--        </a>--}}
{{--    </p>--}}
{{--    <div class="collapse" id="collapseExample">--}}
{{--        <div class="card card-body">--}}
{{--            <div id="form-wrapper">--}}
{{--                <h2 id="form-title">Select Price range</h2>--}}
{{--                <form class="form-inline mb-3"  method="POST" action="/user/hostels/filter">--}}
{{--                    @csrf--}}
{{--                    Min <input class="form-control" type="number" name="minPrice" required>--}}
{{--                    Max <input class="form-control" type="number" name="maxPrice" required>--}}
{{--                    <input class="btn btn-dark mt-5" type="submit" value="Submit">--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

</div>

    <div class="hostel-container">
        @if(!is_bool($hostels))
        @foreach($hostels as $hostel)
            <div class="hostel-item">
                <div class="hostel-img">
                    <img style="width: 100%;height: 100%; border-radius: 10px" src="{{asset('images/'.$hostel->primaryImg)}}">
                </div>
                <div class="hostel-details">
                    <h2>{{$hostel->hostelName}}</h2>
                    <p style="font-size: 10px; margin-left: 3px">{{$hostel->location}}</p>
                    <p style="font-size: 12px">
                        Find yourself with nowhere to go? Hostel_Name has got you covered.
                        It has a place for everyone. Doors are open to anyone that wishes to join us. Together lets make this place a home.
                    </p>
{{--                    <div class="hostel-price">--}}
{{--                        <p>Price: 2000</p>--}}
{{--                    </div>--}}
                </div>
                <div class="hostel-ratings">
                    <div style="display: flex; align-items: center">
                        <h3>Rating : </h3>
                    @foreach($reviews as $review)
                        @if($hostel->id == $review->hostelId)
                                <h2>
                                    {{$review->average}}
                                </h2>

                                <p style="margin-left: 10px">
                                    ({{$review->total}})
                                </p>
                        @endif
                    @endforeach
                    </div>
                    <a  class="view-hostel" href="/user/hostels/{{$hostel->id}}">View</a>
                </div>
            </div>
        @endforeach()
        @endif
    </div>

<script>
    $(document).ready(function() {
        $('.multi-select').select2();
    });
</script>
    <style>
        .center-cropped {
            height: 100vh;
            max-width: 100%;
            /*background-position: center center;*/
            background-repeat: no-repeat;
            background-size: cover;
            background-position: 10% 90%;
            background-image: url('{{asset('images/background/00.jpg')}}');
        }

    </style>



@endsection
