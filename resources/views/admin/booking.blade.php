@extends('layouts.admin.admin')

@section('content')
    <div class="admin-container">
        <table id="example" class="hover" style="width: 100%">
            <thead>
                <th>ID</th>
                <th>User</th>
                <th>Price</th>
                <th>Room</th>
                <th>Payment Status</th>


                <th>Action</th>
            </thead>
            <tbody>
            @foreach($booking as $b)
                <tr>
                    <td>{{$b['id']}}</td>

                    @foreach($users as $user)
                        @if($user->id == $b->userId)
                            <td>{{$user['name']}}</td>
                        @endif
                    @endforeach

                    <td>{{$b['price']}}</td>

                    @foreach($rooms as $room)
                        @if($room->id == $b->roomId)
                          <td>{{$room['roomName']}}</td>
                        @endif
                    @endforeach
                    <td>{{$b['paymentStatus']}}</td>


                    <td>
                        <div style="display:flex;">
                            <a class="button" href="/admin/booking/{{$b->id}}"
                            >Details</a>
{{--                            <form action="{{route('roomType.destroy', $b->id)}}" method="POST">--}}
{{--                                @csrf--}}
{{--                                @method('delete')--}}
{{--                                <button type="submit" class="button">Delete</button>--}}
{{--                            </form>--}}
                        </div>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
