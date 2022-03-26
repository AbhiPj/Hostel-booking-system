@extends('layouts.superadmin.superadmin')

@section('content')
    <div class="admin-container" style="display: flex;flex-direction: column;">
        <table id="example" class="nowrap" >
        <thead>
            <th>ID</th>
            <th>Hostel Name</th>
            <th>Location</th>
            <th>District</th>
            <th>UserId</th>
            <th>Primary Image</th>
    {{--        <th>Additional Images</th>--}}
            <th>Action</th>
        </thead>
            <tbody>
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
    {{--            <td>--}}
    {{--                @foreach (explode(',', $hostels['additionalImages']) as $image)--}}
    {{--                    <img class="myImg" onclick="image(event)" src="{{ asset('images/'.$image)}}">--}}
    {{--                @endforeach--}}
    {{--            </td>--}}
                <td>
                    <div style="display: flex">
                        <a href="{{route('hostels.edit', $hostels->id)}}" class="button">Edit</a>
                        <form action="{{route('hostels.destroy', $hostels->id)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="button">Delete</button>
                        </form>
                    </div>

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
