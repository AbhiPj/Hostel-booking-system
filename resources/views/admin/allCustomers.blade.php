@extends('layouts.admin.admin')

@section('content')

    <div class="admin-container">
        <table id="example" style="width: 100%" class="hover">
            <thead>
            <th>ID</th>
            <th>Customer Name</th>
            <th>Action</th>
            </thead>
            <tbody>
            @foreach($customers as $customer)
                <tr>
                    <td>{{$customer['id']}}</td>
                    <td>{{$customer['customer_name']}}</td>
                    <td>
                        <div style="display: flex">
                            <a class="button" href="{{route("customers.edit", $customer->id)}}"
                            >Edit</a>
                            {{--                        <button onclick="deleteAlert({{$customer['id']}}, 'roomType')" class="button">Delete</button>--}}
                            <form action="{{route('customers.destroy', $customer->id)}}" method="POST">
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
