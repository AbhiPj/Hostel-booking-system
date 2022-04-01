@extends('layouts.user.user')

@section('content')
<div class="mobile-container">
    <div class="appointment-form-container">
        <h2>Appointment</h2>
        <form action="/user/appointment/{{$id}}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="appointmentDate" class="form-label">Date</label>
            <input name="appointmentDate" type="date" class="form-control" id="appointmentDate">
            <label for="appointmentMessage" style="margin-top: 20px" class="form-label">Leave a Message:</label>
            <textarea id="appointmentMessage" style="height: 20vh" name="appointmentMessage" class="form-control"></textarea>
            <button type="submit" class="form-control mt-5">Submit</button>
        </form>
    </div>
</div>


@endsection()
