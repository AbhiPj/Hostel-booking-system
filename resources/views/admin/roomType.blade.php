@extends('layouts.admin.admin')

@section('content')
    <div class="formContainer">
        <form id="editForm" action="{{ route('roomType.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="name">Room Type:</label><br>
            <input type="text" name="roomType"><br>
            <input type="submit" value="Submit"><br><br>
        </form>
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

    <table>
        <tr>
            <th>ID</th>
            <th>Room Name</th>
            <th>Action</th>
        </tr>
        @foreach($data as $rooms)
            <tr>
                <td>{{$rooms['id']}}</td>
                <td>{{$rooms['roomType']}}</td>
                <td>
                    <a class="button" href="{{route("roomType.edit", $rooms->id)}}"
                    >Edit</a>
{{--                    <form action="{{route('roomType.destroy', $rooms->id)}}" method="POST">--}}
{{--                        @csrf--}}
{{--                        @method('delete')--}}
{{--                        <button type="submit" class="button">Delete</button>--}}
{{--                    </form>--}}
                    <button onclick="deleteAlert({{$rooms['id']}}, 'roomType')" class="button">Delete</button>

                </td>
            </tr>
        @endforeach
    </table>


@endsection

