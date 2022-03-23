@extends('layouts.admin.admin')

@section('content')
    <div class="admin-container">
        <table id="example" class="display nowrap" >
            <thead>
                <th>ID</th>
                <th>Room Name</th>
                <th>Room Type</th>
                <th>Price</th>
                <th>Primary Image</th>
{{--                <th>Additional Images</th>--}}
                <th>Action</th>
            </thead>
            <tbody>
            @foreach($rooms as $rooms)
                <tr>
                    <td>{{$rooms['id']}}</td>
                    <td>{{$rooms['roomName']}}</td>
                    @foreach($roomType as $roomType2)
                        @if($roomType2->id == $rooms->roomType)
                            <td>{{$roomType2->roomType}}</td>
                        @endif
                    @endforeach
                    <td>{{$rooms['price']}}</td>
                    <td>
                        <img class="myImg" onclick="image(event)"  id="myImg" src="{{ asset('images/' . $rooms['primaryImg']) }}" />
                    </td>
                    <td>
{{--                        @foreach (explode(',', $rooms['additionalImages']) as $image)--}}
{{--                            <img class="myImg" onclick="image(event)" src="{{ asset('images/'.$image)}}">--}}
{{--                        @endforeach--}}
{{--                    </td>--}}
                    <td>
                        <a href="{{route('rooms.edit', $rooms->id)}}" class="button">Edit</a>
                        <form action="{{route('rooms.destroy', $rooms->id)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="button">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
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
