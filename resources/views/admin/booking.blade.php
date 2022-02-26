@extends('layouts.admin.admin')

@section('content')
    <div style="width: 80%;margin:auto">
        <table id="example" class="display nowrap" style="width: 100%">
            <thead>
                <th>ID</th>
                <th>User ID</th>
                <th>Price</th>
                <th>Room ID</th>
                <th>Payment Status</th>


                <th>Action</th>
            </thead>
            <tbody>
            @foreach($booking as $b)
                <tr>
                    <td>{{$b['id']}}</td>
                    <td>{{$b['userId']}}</td>
                    <td>{{$b['price']}}</td>
                    <td>{{$b['roomId']}}</td>
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
