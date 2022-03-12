@extends('layouts.superadmin.superadmin')

@section('content')

    <div class="admin-container" style="min-height: 10vh;margin-bottom: 20px">
        <form action="{{ route('membershipDetails.store') }}" method="POST">
            @csrf
            <label for="">Duration</label>
            <Select class="room-input" name="duration">
                <option value="1">1 Month</option>
                <option value="3">3 Month</option>
                <option value="6">6 Month</option>
                <option value="12">12 Month</option>
            </Select>
            <label for="">Price</label>
            <input class="room-input" required type="text" name="membershipPrice">
            <input type="submit" value="Submit"><br><br>
        </form>
    </div>
    <div class="admin-container">


        <table id="example" class="display nowrap">
            <thead>
                    <th>ID</th>
                    <th>Duration</th>
                    <th>Price</th>
                    <th>Action</th>
            </thead>
            <tbody>
                @foreach($memberDetails as $details)
                    <tr>
                        <td>{{ $details->id }}</td>
                        <td>{{ $details->duration }}</td>
                        <td>{{ $details->price }}</td>
                        <td>
                            <a href="{{route('membershipDetails.edit', $details->id)}}" class="button">Edit</a>
                            <button onclick="deleteAlert({{$details->id}}, 'memberPrice')" class="button">Delete</button>

                        </td>
                        </form>
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
