@extends('layouts.admin.admin')

@section('content')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <div class="admin-container" style="display: flex;flex-direction: column; justify-content: center">
        <form action="{{ route('roomType.update',$room->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-md-6" style="margin: auto">
                <label class="form-label" for="room_image">Room type:</label><br>
                <input class="form-control" value="{{$room->roomType}}" type="text" name="editRoomType" id="roomType1"><br>
            </div>

            <div style="display:flex;justify-content: center">
                <input style="margin-right: 20px" class="btn btn-primary" type="submit" value="Submit">
                <a class="btn btn-primary" href="{{route("roomType.create")}}">Cancel</a>
            </div>
        </form>
    </div>
@endsection
