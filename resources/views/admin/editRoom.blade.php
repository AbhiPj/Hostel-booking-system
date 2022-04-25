@extends('layouts.admin.admin')

@section('content')
{{--    <link rel="stylesheet" href="{{asset('css/app.css')}}">--}}
    <div class="admin-container" style="display: flex;flex-direction: column; justify-content: center">

    <form action="{{ route('rooms.update',$room->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label" for="name">Name:</label><br>
                <input class="form-control" value="{{$room->roomName}}" type="text" name="name"><br>
            </div>

            <div class="col-md-6">
{{--                <label class="form-label" for="roomType">Room Type:</label><br>--}}
                <input class="form-control" value="{{$room->roomType}}" type="text" name="roomType" hidden><br><br>
            </div>



            <div class="col-12">
                <label class="form-label" for="name">About:</label><br>
                <textarea class="form-control" type="text" name="about">{{$room->about}} </textarea><br>
            </div>

            <div class="col-md-6">
                <label class="form-label" for="roomType">Price:</label><br>
                <input class="form-control" value="{{$room->price}}" type="text" name="price"><br><br>
            </div>
        </div>

        <div class="col-md-6">
            <label class="form-label" for="room_image">Primary Image:</label><br>
            <input class="form-control" type="file" id="primaryImg" name="primaryImg" onchange="preview2()"><br><br>
        </div>

        <div id="images2"></div>
        <div class="col-md-6">
            <label class="form-label" for="room_image">Additional Image:</label><br>
            <input class="form-control" type="file" id="roomImg" name="roomImg[]" multiple onchange="preview()"><br><br>
        </div>
        <div id="images"></div>
        <div style="display:flex;">
            <input class="btn btn-primary" type="submit" value="Submit">
            <a style="margin-left: 10px" class="btn btn-primary" href="{{route('rooms.create')}}">Cancel</a>
        </div>
    </form>
</div>
@endsection
