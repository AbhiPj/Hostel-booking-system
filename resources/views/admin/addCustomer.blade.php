@extends('layouts.admin.admin')

@section('content')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    @if(session()->has('success'))
        <div>
            <script>
                swal("Success", "Data added successfully", "success");
            </script>
        </div>
    @endif

    <div class="admin-container" style="display: flex;flex-direction: column; justify-content: center">
        <form class="row g-3" action="{{ route('customers.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6">
                <label for="inputCustomer" class="form-label">Customer Name</label>
                <input type="text" class="form-control" id="inputCustomer" name="customerName">
            </div>
            <div class="col-md-6">
                <label for="inputPhone" class="form-label">Phone number</label>
                <input type="text" class="form-control" id="inputPhone" name="phoneNumber">
            </div>
                        <div class="col-md-4">
                            <label for="inputState" class="form-label">Room</label>
                            <select name="selectRoom" id="inputState" class="form-select">
                                <option selected>Choose...</option>
                                @foreach($rooms as $room)
                                    <option value="{{$room->id}}">{{$room->roomName}}</option>
                                @endforeach
                            </select>
                        </div>
{{--            <div class="col-12">--}}
{{--                <label for="inputAddress" class="form-label">Address</label>--}}
{{--                <input type="text" class="form-control" id="inputAddress" name="address">--}}
{{--            </div>--}}
{{--            <div class="col-12">--}}
{{--                <label for="inputAddress2" class="form-label">Address 2</label>--}}
{{--                <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">--}}
{{--            </div>--}}
{{--            <div class="col-md-6">--}}
{{--                <label for="inputCity" class="form-label">City</label>--}}
{{--                <input type="text" class="form-control" id="inputCity">--}}
{{--            </div>--}}
{{--            <div class="col-md-4">--}}
{{--                <label for="inputState" class="form-label">State</label>--}}
{{--                <select id="inputState" class="form-select">--}}
{{--                    <option selected>Choose...</option>--}}
{{--                    <option>...</option>--}}
{{--                </select>--}}
{{--            </div>--}}
{{--            <div class="col-md-2">--}}
{{--                <label for="inputZip" class="form-label">Zip</label>--}}
{{--                <input type="text" class="form-control" id="inputZip">--}}
{{--            </div>--}}
{{--            <div class="col-12">--}}
{{--                <div class="form-check">--}}
{{--                    <input class="form-check-input" type="checkbox" id="gridCheck">--}}
{{--                    <label class="form-check-label" for="gridCheck">--}}
{{--                        Check me out--}}
{{--                    </label>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Check in</button>
            </div>
        </form>
    </div>

@endsection
