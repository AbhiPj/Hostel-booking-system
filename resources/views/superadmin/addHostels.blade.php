@extends('layouts.superadmin.superadmin')

@section('content')
    <div class="admin-container" style="display: flex;flex-direction: column; justify-content: center">
        <form action="{{ route('hostels.store') }}" method="POST" enctype="multipart/form-data">
            <div class="add-room-container">
                @csrf
                <input class="room-input" placeholder="Name" type="text" name="hostelName"><br>
                <input class="room-input" placeholder="UserId" type="text" name="userId"><br>
                <input class="room-input" placeholder="About" type="text" name="about"><br>
                <input class="room-input" placeholder="Location" type="text" name="location"><br>
                <input class="room-input" placeholder="District" type="text" name="district"><br>
            </div>
            <div>
                <label for="room_image">Room Image:</label><br>
                <input type="file" id="primaryImg" name="primaryImg" onchange="preview2()"><br><br>
                <div id="images2"></div>
                <input type="file" id="roomImg" name="roomImg[]" multiple onchange="preview()"><br><br>
                <div id="images"></div>
                <input class="submit-button" style="height: 30px; padding:0" type="submit" value="Submit">
            </div>
        </form>
    </div>


@endsection
