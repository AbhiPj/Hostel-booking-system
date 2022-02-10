@extends('layouts.admin')

@section('content')
    <div class="formContainer">
        <form action="{{ route('roomType.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="name">Room Type:</label><br>
            <input type="text" name="roomType"><br>
            <input type="submit" value="Submit"><br><br>
        </form>
    </div>
    <table>
        <tr>
{{--            <th>ID</th>--}}
            <th>Room Name</th>
            <th>Action</th>
        </tr>
        @foreach($data as $rooms)
            <tr>
                <td>{{$rooms['roomType']}}</td>
                <td>
                    <a href="{{route('roomType.edit', $rooms->id)}}" class="button">Edit</a>
                    <form action="{{route('roomType.destroy', $rooms->id)}}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="button">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <div id="overlay" onclick="off()">
        <div id="text">Overlay Text</div>
        <form action="{{ route('roomType.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="name">Room Type:</label><br>
            <input type="text" name="roomType"><br>
            <input type="submit" value="Submit"><br><br>
        </form>
    </div>

    <div style="padding:20px">
        <h2>Overlay with Text</h2>
        <button onclick="on()">Turn on overlay effect</button>
    </div>

    <script>
        function on() {
            document.getElementById("overlay").style.display = "block";
        }

        function off() {
            document.getElementById("overlay").style.display = "none";
        }
    </script>
@endsection
