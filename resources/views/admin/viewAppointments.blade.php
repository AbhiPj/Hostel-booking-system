@extends('layouts.admin.admin')

@section('content')
    <div class="admin-container">
        <table id="example" class="hover" style="width: 100%">
            <thead>
            <th>ID</th>
            <th>Appointment Date</th>
            <th>Message</th>
            <th>Appointment Status</th>
            <th>User</th>


            <th>Action</th>
            </thead>
            <tbody>
            @foreach($appointments as $a)
                <tr>
                    <td>{{$a['id']}}</td>
                    <td>{{$a['appointment_date']}}</td>
                    <td>{{$a['appointment_message']}}</td>
                    <td>{{$a['appointment_status']}}</td>
                    <td>{{$a['userId']}}</td>


                    <td>
                        <div style="display:flex;">
                            <a class="button" href="/admin/booking/{{$a->id}}"
                            >Details</a>
                        </div>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
