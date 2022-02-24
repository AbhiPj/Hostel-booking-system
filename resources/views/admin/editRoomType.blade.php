@extends('layouts.admin.admin')

@section('content')
    <div class="formContainer">
        <form action="{{ route('roomType.update',$room->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label for="roomType">Room Type:</label><br>
            <input value="{{$room->roomType}}" type="text" name="editRoomType" id="roomType1"><br>
            <input type="submit" value="Submit">
            <a href="{{route("roomType.create")}}">Cancel</a>
        </form>
    </div>
@endsection
