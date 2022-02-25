@extends('layouts.admin.admin')

@section('content')

    <div>
        <form action="{{ route('membershipDetails.store') }}" method="POST">
            @csrf
            <label for="">Duration</label>
            <Select name="duration">
                <option value="1">1 Month</option>
                <option value="3">3 Month</option>
                <option value="6">6 Month</option>
                <option value="12">12 Month</option>
            </Select>
            <label for="">Price</label>
            <input required type="text" name="membershipPrice">
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
    <div>
        <table>
            <tr>
                <th>ID</th>
                <th>Duration</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
            @foreach($memberDetails as $details)
                <tr>
                    <td>{{ $details->id }}</td>
                    <td>{{ $details->duration }}</td>
                    <td>{{ $details->price }}</td>
                    <td>
                        <a href="{{route('membershipDetails.edit', $details->id)}}" class="button">Edit</a>
{{--                        <form action="{{route('membershipDetails.destroy', $details->id)}}" method="POST">--}}
{{--                            @csrf--}}
{{--                            @method('delete')--}}
{{--                            <button onclick="deleteAlert()" type="submit" class="button">Delete</button>--}}
{{--                        </form>--}}
                            <button onclick="deleteAlert({{$details->id}}, 'memberPrice')" class="button">Delete</button>

                    </td>
                    </form>
                </tr>
            @endforeach
        </table>

    </div>

@endsection
