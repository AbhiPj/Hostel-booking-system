@extends('layouts.admin.admin')

@section('content')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <div class="admin-container" style="display: flex;flex-direction: column; justify-content: center">
        <form action="{{ route('customers.update',$customer->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label" for="name">Name:</label><br>
                    <input class="form-control" value="{{$customer->customer_name}}" type="text" name="name"><br>
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="phoneNumber">Phone number:</label><br>
                    <input class="form-control" value="{{$customer->phone_number}}" type="text" name="phoneNumber"><br><br>
                </div>

{{--                <div class="col-12">--}}
{{--                    <label class="form-label" for="name">About:</label><br>--}}
{{--                    <textarea class="form-control" type="text" name="about">{{$customer->about}} </textarea><br>--}}
{{--                </div>--}}

{{--                <div class="col-md-6">--}}
{{--                    <label class="form-label" for="roomType">Price:</label><br>--}}
{{--                    <input class="form-control" value="{{$customer->price}}" type="text" name="price"><br><br>--}}
{{--                </div>--}}
{{--            </div>--}}

            <div style="display:flex;">
                <input class="btn btn-primary" type="submit" value="Submit">
                <a style="margin-left: 10px" class="btn btn-primary" href="{{route('customers.create')}}">Cancel</a>
            </div>
        </form>
    </div>

@endsection
