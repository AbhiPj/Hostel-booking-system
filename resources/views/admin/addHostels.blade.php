@extends('layouts.admin.admin')

@section('content')
    <div class="formContainer">
        <form action="{{ route('hostels.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="name">Hostel Name:</label><br>
            <input type="text" name="hostelName"><br>
            <label for="name">userId:</label><br>
            <input type="text" name="userId"><br>
            <label for="about">About:</label><br>
            <input type="text" name="about"><br>
            <label for="about">location:</label><br>
            <input type="text" name="location"><br>
            <label for="about">district:</label><br>
            <input type="text" name="district"><br>
            <label for="room_image">Room Image:</label><br>
            <input type="file" id="primaryImg" name="primaryImg" onchange="preview2()"><br><br>
            <div id="images2"></div>
            <input type="file" id="roomImg" name="roomImg[]" multiple onchange="preview()"><br><br>
            <div id="images"></div>
            <input type="submit" value="Submit"><br><br>
        </form>
    </div>
    <table>
        <tr>
            <th>ID</th>
            <th>Hostel Name</th>
            <th>Location</th>
            <th>District</th>
            <th>UserId</th>
            <th>Primary Image</th>
            <th>Additional Images</th>
            <th>Action</th>
        </tr>
        @foreach($hostels as $hostels)
            <tr>
                <td>{{$hostels['id']}}</td>
                <td>{{$hostels['hostelName']}}</td>
                <td>{{$hostels['location']}}</td>
                <td>{{$hostels['district']}}</td>
                <td>{{$hostels['userId']}}</td>
                <td>
                    <img class="myImg" onclick="image(event)"  id="myImg" src="{{ asset('images/' . $hostels['primaryImg']) }}" />
                </td>
                <td>
                    @foreach (explode(',', $hostels['additionalImages']) as $image)
                        <img class="myImg" onclick="image(event)" src="{{ asset('images/'.$image)}}">
                    @endforeach
                </td>
                <td>
                    <a href="{{route('hostels.edit', $hostels->id)}}" class="button">Edit</a>
                    <form action="{{route('hostels.destroy', $hostels->id)}}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="button">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

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
@endsection
