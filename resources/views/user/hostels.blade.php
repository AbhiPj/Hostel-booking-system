@extends('layouts.user.user')

@section('content')

    <div style="height: 50vh;overflow-y: hidden" class="hostel-top-img">
        <div class="center-cropped">
        </div>
    </div>


<div>
    <form class="hostel-search" action="/user/hostels/search" method="POST">
        @csrf
        <div class="search-holder">
            <input name="hostelSearch" class="search-box" placeholder="Seach">
        </div>
        <div class="search-button-container">
{{--            <a class="search-button" href="#">Search</a>--}}
            <button type="submit" class="search-button">Search</button>

        </div>
    </form>

</div>

{{--    <form action="{{route('rooms.destroy', $rooms->id)}}" method="POST">--}}
{{--        @csrf--}}
{{--        @method('delete')--}}
{{--        <button type="submit" class="button">Delete</button>--}}
{{--    </form>--}}

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
                        Find yourself with nowhere to go? Hoste_Name has got you covered.
                        It has a place for everyone. Doors are open to anyone that wishes to join us. Together lets make this place a home.
                    </p>
                    <div class="hostel-price">
                        <p>Price: 2000</p>
                    </div>
                </div>
                <div class="hostel-ratings">
                    <a  class="view-hostel" href="/user/hostels/{{$hostel->id}}">View</a>
                </div>
            </div>
        @endforeach()
        @endif

        @if(is_bool($hostels))
            <p>ver nice</p>

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
