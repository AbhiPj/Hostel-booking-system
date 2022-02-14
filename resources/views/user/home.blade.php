
@extends('layouts.user')

@section('content')
    <section class="site-title">
        <div class="site-background" data-aos="fade-up" data-aos-delay="100">
{{--            <h3 style="color: black">Tours & Travels</h3>--}}
{{--            <h1 style="color:black;">Amazing Place on Earth</h1>--}}
            <input name="search" placeholder="search" style="border-radius: 25px; width: 500px; height: 35px; margin-top: 20px"><br>
            <button class="btn">Explore</button>
        </div>
    </section>

    <section>
        <div >
            <div class="roomContainer">
                @foreach($rooms as $rooms)
                    <div class="blog-post">
                        <div class="blog-content" data-aos="fade-right" data-aos-delay="200">
                            <img class="blog-img" src="{{asset('images/' . $rooms['primaryImg'])}}" alt="post-1">
                            <div class="blog-title">
                                <h3>{{$rooms->roomName}}</h3>
                                <button class="btn btn-blog">View</button>
                                <span>{{$rooms->price}}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection


