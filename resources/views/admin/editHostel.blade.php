@extends('layouts.admin')

@section('content')
    <div class="formContainer">
        <form action="{{ route('hostels.update',$hostels->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <label for="name">Hostel Name:</label><br>
            <input value="{{$hostels->hostelName}}" type="text" name="hostelName"><br>
            <label for="name">userId:</label><br>
            <input value="{{$hostels->userId}}" type="text" name="userId"><br>
            <label for="about">About:</label><br>
            <input value="{{$hostels->about}}" type="text" name="about"><br>
            <label for="about">location:</label><br>
            <input value="{{$hostels->location}}" type="text" name="location"><br>
            <label for="about">district:</label><br>
            <input value="{{$hostels->district}}" type="text" name="district"><br>
            <label for="room_image">Room Image:</label><br>
            <input type="file" id="primaryImg" name="primaryImg" onchange="preview2()"><br><br>
            <div id="images2"></div>
            <input type="file" id="roomImg" name="roomImg[]" multiple onchange="preview()"><br><br>
            <div id="images"></div>
            <input type="submit" value="Submit"><br><br>
            <a href="{{route("hostels.create")}}">Cancel</a>
        </form>
    </div>
@endsection
