@extends('layouts.superadmin.superadmin')

@section('content')
    <p>requests</p>
        <table id="example" class="display nowrap" >
            <thead>
            <th>ID</th>
            <th>Hostel Name</th>
            <th>District</th>
            <th>Features</th>
            <th>Location</th>
            </thead>
            <tbody>
            @foreach($requestHostels as $requests)
                <tr>
                    <td>{{$requests['id']}}</td>
                    <td>{{$requests['hostelName']}}</td>
                    <td>{{$requests['district']}}</td>

                    <td>
                        @foreach (explode(',', $requests['features']) as $item)
                            <p>{{$item}}</p>
                        @endforeach
                    </td>
                    <td>{{$requests['location']}}</td>

                                        <td>
                        <a href="{{route('requestHostels.edit', $requests->id)}}" class="button">Edit</a>
                        <form action="{{route('requestHostels.destroy', $requests->id)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="button">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
@endsection
