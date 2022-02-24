@extends('layouts.admin.admin')

@section('content')
    <form action="{{ route('membershipDetails.update', $membershipDetails->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <label for="id">Membership Detail ID:</label><br>
        <input type="text" name="ID" id="editid" readonly value="{{ $membershipDetails->id }}"><br>
        <label for="duration">Duration in months</label><br>
        <input type="text" readonly value="{{ $membershipDetails->duration }}"><br>
        <label for="price">Price:</label><br>
        <input type="text" name="price" id="price" value="{{ $membershipDetails->price }}"><br>
        <input type="submit" id="editBtnSubmit" value="Submit">
    </form>
@endsection
