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
            <input type="text" name="membershipPrice">
            <input type="submit" value="Submit"><br><br>
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
                    <td>{{ $details->id }}</td>
                    <td>{{ $details->duration }}</td>
                    <td>{{ $details->price }}</td>
                    <td>
                        <a href="{{route('membershipDetails.edit', $details->id)}}" class="button">Edit</a>
                        <form action="{{route('membershipDetails.destroy', $details->id)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="button">Delete</button>
                        </form>
                    </td>

                    </form>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
