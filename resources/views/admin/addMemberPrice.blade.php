@extends('layouts.admin.admin')

@section('content')

    <div>
        <form action="">
            <label for="">Duration</label>
            <Select>
                <option value="1">1 Month</option>
                <option value="3">3 Month</option>
                <option value="6">6 Month</option>
                <option value="12">12 Month</option>
            </Select>
            <label for="">Price</label>
            <input type="text" name="membershipPrice">
        </form>
    </div>

    <div>

        <table>
            <tr>
                <th>ID</th>
                <th>Duration</th>
                <th>Price</th>
            </tr>
            @foreach($memberDetails as $details)
                <tr>
                    <th>{{ $membershipDetail->id }}</th>
                    <th>{{ $membershipDetail->duration }}</th>
                    <th>{{ $membershipDetail->price }}</th>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
