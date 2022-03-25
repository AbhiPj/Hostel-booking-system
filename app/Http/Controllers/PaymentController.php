<?php

namespace App\Http\Controllers;

use App\Models\Bookings;
use App\Models\Hostels;
use App\Models\Payment;
use App\Models\Rooms;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $booking = Bookings::all();
        return view('user.payment',compact('booking'));
    }

    public function viewPayment($id)
    {
        $rooms = Rooms::find($id);
        return view('user.payment',compact('rooms'));
    }

    public function checkout(Request $request)
    {



        $roomId=$request->roomId;
        $userId= Auth::id();


        $userInfo= Auth::user();
        $userEmail = $userInfo->email;

        $rooms = Rooms::find($roomId);
        $hostelId= $rooms->hostelId;
        $admin = Hostels::where('id','=',$hostelId)->first();
        $adminDetails= User::find($admin->id);
        $adminEmail = $adminDetails->email;



        $booking = new Bookings();
        $booking->userId=$userId;
        $booking->roomId=$rooms->id;
        $booking->price=$rooms->price;
        $booking->hostelId=$rooms->hostelId;
        $booking->paymentStatus=$request->paymentMethod;

        $booking->firstName = $request->firstName;
        $booking->lastName = $request->lastName;
        $booking->email = $request->email;
        $booking->phoneNumber = $request->phoneNumber;
        $booking->address = $request->address;
        $booking->street = $request->street;
        $booking->city = $request->city;
        $booking->province = $request->province;
        $booking->district = $request->district;
        $booking->zipCode = $request->zipCode;


        $booking->save();

        $bookingId= $booking->id;
        $payment = new Payment();
        $payment->bookingId=$bookingId;
        $payment->paymentMethod=$request->paymentMethod;
        $payment->price=$rooms->price;
        $payment->save();

        //updating room status to unavailable after customer checks in
        $room = Rooms::find($roomId);
        $room->roomStatus="booked";
        $room->save();

        $details = [
            'title' => 'Mail from HostelSansar.com',
            'body' => 'New booking alert'
        ];





        \Mail::to($userEmail)->send(new \App\Mail\Mail($details));
        \Mail::to($adminEmail)->send(new \App\Mail\Mail($details));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
