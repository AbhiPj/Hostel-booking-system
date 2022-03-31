<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Hostels;
use App\Models\Rooms;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isNull;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $id = Auth::id();
        $hostel = Hostels::where('userId','=',$id)->first();
        $hostelId= $hostel->id;
        $rooms= Rooms::where('hostelId','=',$hostelId)->where('roomStatus','=','available')->orwhere('roomStatus','=','booked')->get();
        return view('admin.addCustomer',compact('rooms'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //getting Room id and finding hostel id of the room
        $roomId=$request->get('selectRoom');
        $room = Rooms::find($roomId);
        $hostelId=$room->hostelId;

        //storing new customer data
        $customer = new Customer();
        $customer->customer_name=$request->get('customerName');
        $customer->phone_number=$request->get('phoneNumber');
        $customer->roomId=$roomId;
        $customer->hostelId= $hostelId;
        $customer->checkout_status="false";
        $customer->save();

        //updating room status to unavailable after customer checks in
        $room = Rooms::find($roomId);
        $room->roomStatus="unavailaible";
        $room->save();

        return redirect()->route('customers.create')->with('success','Added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $customer = Customer::find($id);
        $customer->delete();
        return redirect()->route('customers.create');
    }

    public function viewAllCustomer()
    {
        $id = Auth::id();
        $hostel = Hostels::where('userId','=',$id)->first();
        $hostelId= $hostel->id;
        $customers= Customer::where('hostelId','=',$hostelId)->get();
        return view('admin.allCustomers',compact('customers'));
    }

    public function checkoutCustomer($id)
    {
        $customer = Customer::find($id);
        $ldate = date('Y-m-d');

        $customer->checkout_status="true";
        $customer->checkout_date=$ldate;
        $customer->save();

        //updating room status to unavailable after customer checks in
        $roomId= $customer->roomId;
        $room = Rooms::find($roomId);
        $room->roomStatus="available";
        $room->save();

        return redirect('/home');


    }

    public function checkout()
    {
        $id = Auth::id();
        $hostel = Hostels::where('userId','=',$id)->first();
        $hostelId= $hostel->id;
        $customers= Customer::where('hostelId','=',$hostelId)->where('checkout_status','=','false')->get();
        $rooms= Rooms::all();

        return view('admin.checkout',compact('customers','rooms'));
    }
}
