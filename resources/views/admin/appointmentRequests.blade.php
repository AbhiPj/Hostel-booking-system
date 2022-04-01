@extends('layouts.admin.admin')

@section('content')
    <div class="admin-container" style="display: flex;flex-direction: column;">
        <table id="example" class="nowrap" >
            <thead>
            <th>ID</th>
            <th>Appointment Date</th>
            <th>User</th>
            <th>Actions</th>
            </thead>
            <tbody>
            @foreach($appointments as $requests)
                <tr>
                    <td>{{$requests['id']}}</td>
                    <td>{{$requests['appointment_date']}}</td>
                    <td>{{$requests['userId']}}</td>
                    <td>
                        <div style="display: flex">
                            <a href="/admin/requestAppointment/activate/{{$requests->id}}" class="button">Activate</a>
                            <form action="{{route('appointments.destroy', $requests->id)}}" method="POST">
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
