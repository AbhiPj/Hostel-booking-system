@extends('layouts.superadmin.superadmin')

@section('content')
    <div class="admin-container" style="display: flex;flex-direction: column;">
        <table id="example" class="nowrap" >
                <thead>
                <th>ID</th>
                <th>Hostel Name</th>
                <th>District</th>
                <th>Features</th>
                <th>Location</th>
                <th>Action</th>

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
                            <div style="display: flex">
                                <a href="/admin/requestHostel/activate/{{$requests->id}}" class="button">Activate</a>
                                <form action="{{route('requestHostels.destroy', $requests->id)}}" method="POST">
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
@endsection
