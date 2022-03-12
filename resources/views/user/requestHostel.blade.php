@extends('layouts.user.user')

@section('content')
<div class="request-hostel-container">
    <form action="/user/requestHostel/submit" method="POST" enctype="multipart/form-data" style="width: 65%; margin: auto;margin-top: 100px">
        <div class="add-room-container">
            @csrf
            <input class="room-input" style="width: 88%" placeholder="Hostel Name" type="text" name="hostelName"><br>
            <textarea class="room-input" style="width: 88%; height: 10vh" placeholder="Hostel Description" type="text" name="hostelDescription"></textarea><br>
            <textarea class="room-input" style="width: 88%; height: 10vh" placeholder="Features" type="text" name="features"></textarea><br>
            <input class="room-input" placeholder="Location" type="text" name="location"><br>
            <input class="room-input" placeholder="District" type="text" name="district"><br>
        </div>

        <div>
            <input class="submit-button" style="height: 30px; padding:0" type="submit" value="Submit">
        </div>
    </form>

</div>

    <style>
        .request-hostel-container{
            background-color: white;
            border-radius: 10px;
            height: 90vh;
            width: 90%;
            margin:auto;
            box-shadow: 0 5px 10px rgb(0 0 0 / 10%);
            margin-top: 10px;
            padding: 20px;

        }
    </style>
@endsection
