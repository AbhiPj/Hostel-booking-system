@extends('layouts.admin.admin')

@section('content')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
<div class="admin-container" style="display: flex;flex-direction: column; justify-content: center">
    @if(session()->has('success'))
        <div class="alert alert-success">
            <script>
                swal("Success", "Data added successfully", "success");
            </script>
        </div>
    @endif
    @if(session()->has('error'))
        <div class="alert alert-success">
            <script>
                swal("Error", "Duration already exists", "error");
            </script>
        </div>
    @endif
{{--    <form action="{{ route('rooms.store') }}" method="POST" enctype="multipart/form-data">--}}
{{--        <div class="add-room-container">--}}
{{--            @csrf--}}
{{--            <input placeholder="Name" class="room-input" type="text" name="name">--}}
{{--            <input placeholder="About" class="room-input" type="text" name="about">--}}
{{--            <input placeholder="Price" class="room-input" type="text" name="price">--}}
{{--            <select class="room-input" name="roomType" id="">--}}
{{--                @foreach($roomType as $roomType1)--}}
{{--                    <option value="{{$roomType1->id}}">{{$roomType1->roomType}}</option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--        </div>--}}
{{--        <div class="add-room-container" style="width: 92%; margin: auto">--}}
{{--            <label for="room_image">Room Image:</label><br>--}}
{{--            <input type="file" id="primaryImg" name="primaryImg" onchange="preview2()"><br><br>--}}
{{--            <div id="images2"></div>--}}
{{--            <label for="room_image">Additional Images:</label><br>--}}

{{--            <input type="file" id="roomImg" name="roomImg[]" multiple onchange="preview()"><br><br>--}}
{{--            <div id="images"></div>--}}
{{--        </div>--}}
{{--        <input class="submit-button" style="height: 30px; padding:0" type="submit" value="Submit">--}}
{{--    </form>--}}
        <form class="row g-3">
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputEmail4">
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Password</label>
                <input type="password" class="form-control" id="inputPassword4">
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Address</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
            </div>
            <div class="col-12">
                <label for="inputAddress2" class="form-label">Address 2</label>
                <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
            </div>
            <div class="col-md-6">
                <label for="inputCity" class="form-label">City</label>
                <input type="text" class="form-control" id="inputCity">
            </div>
            <div class="col-md-4">
                <label for="inputState" class="form-label">State</label>
                <select id="inputState" class="form-select">
                    <option selected>Choose...</option>
                    <option>...</option>
                </select>
            </div>
            <div class="col-md-2">
                <label for="inputZip" class="form-label">Zip</label>
                <input type="text" class="form-control" id="inputZip">
            </div>
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        Check me out
                    </label>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Sign in</button>
            </div>
        </form>
</div>

        <!-- The Modal -->
            <div id="myModal" class="modal">
                <!-- The Close Button -->
                <span class="close">&times;</span>
                <!-- Modal Content (The Image) -->
                <img class="modal-content" id="img01">
                <!-- Modal Caption (Image Text) -->
                <div id="caption"></div>
            </div>
        </div>

<script>
    // Get the modal
    var modal = document.getElementById("myModal");
    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    function image(event)  {
        modal.style.display = "block";
        modalImg.src = event.target.src;
        captionText.innerHTML = event.target.alt;
    }

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
    }
</script>

    <style>


    </style>

@endsection
