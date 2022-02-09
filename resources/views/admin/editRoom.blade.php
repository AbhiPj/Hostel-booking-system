@extends('layouts.admin')

@section('content')
<div class="formContainer">
    <form action="{{ route('rooms.update',$room->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <label for="name">Name:</label><br>
        <input value="{{$room->roomName}}" type="text" name="name"><br>
        <label for="roomType">Room Type:</label><br>
        <input value="{{$room->roomType}}" type="text" name="roomType"><br><br>
        <label for="name">About:</label><br>
        <textarea type="text" name="about">{{$room->about}} </textarea><br>
        <label for="roomType">Price:</label><br>
        <input value="{{$room->price}}" type="text" name="price"><br><br>
        <label for="room_image">Primary Image:</label><br>
        <input type="file" id="primaryImg" name="primaryImg" onchange="preview2()"><br><br>
        <div id="images2"></div>
        <label for="room_image">Additional Image:</label><br>
        <input type="file" id="roomImg" name="roomImg[]" multiple onchange="preview()"><br><br>
        <div id="images"></div>
        <input type="submit" value="Submit"><br><br>
        <a href="/image-upload">Cancel</a>

    </form>
</div>
@endsection
