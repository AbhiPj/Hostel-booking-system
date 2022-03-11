@extends('layouts.admin.admin')

@section('content')
    <div class="admin-container" style="height: 10vh; margin-bottom: 20px">
        <form id="editForm" action="{{ route('roomType.store') }}" method="POST" enctype="multipart/form-data">
            <div style="display: flex;flex-wrap: wrap">
                @csrf
                <label for="name">Room Type:</label><br>
                <input class="room-input" type="text" name="roomType"><br>
                <input class="room-input" style="width: 20%" type="submit" value="Submit"><br><br>
            </div>

        </form>
    </div>
    <div class="admin-container">
        <table id="example" class="display nowrap">
            <thead>
                    <th>ID</th>
                    <th>Room Name</th>
                    <th>Action</th>
            </thead>
            <tbody>
                @foreach($data as $rooms)
                    <tr>
                        <td>{{$rooms['id']}}</td>
                        <td>{{$rooms['roomType']}}</td>
                        <td>
                            <a class="button" href="{{route("roomType.edit", $rooms->id)}}"
                            >Edit</a>
                            <button onclick="deleteAlert({{$rooms['id']}}, 'roomType')" class="button">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>

    </div>

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





@endsection

