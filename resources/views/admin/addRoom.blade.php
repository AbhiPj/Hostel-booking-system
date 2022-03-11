@extends('layouts.admin.admin')

@section('content')

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

        <form action="{{ route('rooms.store') }}" method="POST" enctype="multipart/form-data">
                <div class="add-room-container">
                    @csrf
                    <input placeholder="Name" class="room-input" type="text" name="name">
                    <input placeholder="About" class="room-input" type="text" name="about">
                    <input placeholder="Price" class="room-input" type="text" name="price">
                    <select class="room-input" name="roomType" id="">
                        @foreach($roomType as $roomType1)
                            <option value="{{$roomType1->id}}">{{$roomType1->roomType}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="add-room-container" style="width: 92%; margin: auto">
                    <label for="room_image">Room Image:</label><br>
                    <input type="file" id="primaryImg" name="primaryImg" onchange="preview2()"><br><br>
                    <div id="images2"></div>
                    <label for="room_image">Additional Images:</label><br>

                    <input type="file" id="roomImg" name="roomImg[]" multiple onchange="preview()"><br><br>
                    <div id="images"></div>
                </div>
                <input class="submit-button" style="height: 30px; padding:0" type="submit" value="Submit">
        </form>

    </div>


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
