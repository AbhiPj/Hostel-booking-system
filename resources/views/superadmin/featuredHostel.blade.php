@extends('layouts.superadmin.superadmin')

@section('content')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <div class="admin-container" style="min-height: 10vh; height:auto; margin-bottom: 20px">
        <form class="row-g-3" action="{{ route('featured.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label class="form-label">Select hostel:</label>
            <select name="featured" class="form-select">
                <option selected>Choose...</option>
                @foreach($hostels as $hostel)
                    <option value="{{$hostel->id}}">{{$hostel->hostelName}}</option>
                @endforeach
            </select>
            <input class="btn btn-primary" type="submit" value="Submit">
        </form>
    </div>

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
@endsection
