@extends('layouts.superadmin.superadmin')

@section('content')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <div class="admin-container" style="display: flex;flex-direction: column;">
        <form class="row g-3" action="{{ route('hostels.update',$hostels->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="col-md-6">
                <label for="name">Hostel Name:</label><br>
                <input class="form-control" value="{{$hostels->hostelName}}" type="text" name="hostelName"><br>
            </div>

            <div class="col-md-6">
                <label for="name">userId:</label><br>
                <input class="form-control" value="{{$hostels->userId}}" type="text" name="userId"><br>
            </div>

            <div class="col-12">
                <label for="about">About:</label><br>
                <textarea class="form-control" value="{{$hostels->about}}" type="text" name="about"></textarea><br>
            </div>

            <div class="col-md-6">
                <label for="about">location:</label><br>
                <input class="form-control" value="{{$hostels->location}}" type="text" name="location"><br>
            </div>

            <div class="col-md-6">
                <label for="about">district:</label><br>
                <input class="form-control" value="{{$hostels->district}}" type="text" name="district"><br>
            </div>

            <div class="col-md-6">
                <label for="room_image">Room Image:</label><br>
                <input class="form-control" type="file" id="primaryImg" name="primaryImg" onchange="preview2()"><br><br>
            </div>
{{--            <div id="images2"></div>--}}
            <div class="col-md-6">
                <label for="room_image">Additional Images:</label><br>
                <input class="form-control" type="file" id="roomImg" name="roomImg[]" multiple onchange="preview()"><br><br>
            </div>
            <div id="images"></div>
            <div style="display: flex">
                <input type="submit" class="btn btn-primary" value="Submit" style="margin-right: 4px">
                <a class="btn btn-primary" href="{{route("hostels.index")}}">Cancel</a>
            </div>

        </form>
    </div>
@endsection
