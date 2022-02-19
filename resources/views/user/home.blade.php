
@extends('layouts.user')

@section('content')
    <section class="site-title">
        <div class="site-background" >
            <h1 style="margin-bottom: 80px; color: #313d59; font-size: 3.2rem">Welcome to Hostel Sansar</h1>
            <input name="search" placeholder="search" style="border-radius: 25px; width: 500px; height: 35px; margin-top: 20px"><br>
            <button class="btn">Explore</button>
        </div>
    </section>

    <section>
        <div >
            <div style="text-align: center; color: grey">
                <h1 style="margin-top: 20px; color:#313d59">Rooms</h1>
            </div>
            <div class="roomContainer">
                @foreach($rooms as $rooms)
                    <div class="blog-post">
                        <div class="blog-content">
                            <img class="blog-img" src="{{asset('images/' . $rooms['primaryImg'])}}" alt="post-1">
                            <div class="blog-title">
                                <h3 style="color: #313d59">{{$rooms->roomName}}</h3>
{{--                                <p>{{$rooms->about}}</p>--}}
                                <a href="/user/rooms/{{$rooms->id}}" class="btn btn-blog">View</a>
                                <span>{{$rooms->price}}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection


