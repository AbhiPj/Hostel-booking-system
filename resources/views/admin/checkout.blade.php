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
                        <a class="button" href="{{route("roomType.edit", $customer->id)}}"
                        >Edit</a>
                        <a class="button" href="/admin/customer/checkout/{{$customer->id}}"
                        >Checkout</a>
{{--                        <button onclick="deleteAlert({{$customer['id']}}, 'roomType')" class="button">Delete</button>--}}
                        <form action="{{route('customers.destroy', $customer->id)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="button">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>

    </div>
@endsection
