@extends('layouts.admin')

@section('content')
    <table>
        <tr>
            <th>ID</th>
            <th>User ID</th>
            <th>Price</th>
            <th>Room ID</th>
            <th>Payment Status</th>


            <th>Action</th>
        </tr>
        @foreach($booking as $b)
            <tr>
                <td>{{$b['id']}}</td>
                <td>{{$b['userId']}}</td>
                <td>{{$b['price']}}</td>
                <td>{{$b['roomId']}}</td>
                <td>{{$b['paymentStatus']}}</td>


                <td>
                    <a class="button" href="{{route("roomType.edit", $b->id)}}"
                    >Edit</a>
                    <form action="{{route('roomType.destroy', $b->id)}}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="button">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>@endsection
