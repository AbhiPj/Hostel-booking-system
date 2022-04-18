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

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $booking = Bookings::all();
        return view('user.payment',compact('booking'));
    }

    //Viewing the payment page
    public function viewPayment($id)
    {
        //redirecting to home page if room is not available
        if (Auth::check()) {
            // The user is logged in...
            $rooms = Rooms::find($id);
            if ($rooms->roomStatus !== "available")
            {
                return redirect('/home');
            }else{
                return view('user.payment',compact('rooms'));
            }
        }else{
            return redirect('/login');
        }

    }

    public function checkout(Request $request)
    {

        $validator = \Validator::make($request->all(), [
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required',
            'phoneNumber' => 'required',
            'address' => 'required',
            'street' => 'required',
            'city' => 'required',
            'province' => 'required',
            'district' => 'required',
            'zipCode' => 'required',


        ]);

        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }

        $userId= Auth::id();
        $roomId=$request->roomId;
        $rooms = Rooms::find($roomId);
        $hostelId= $rooms->hostelId;

        //Saving booking details to database
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

        //Saving payment details to database
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



        //Getting user email
        $userInfo= Auth::user();
        $userEmail = $userInfo->email;

        //Getting admin email
        $admin = Hostels::where('id','=',$hostelId)->first();
        $adminDetails= User::find($admin->id);
        $adminEmail = $adminDetails->email;

        \Mail::to($userEmail)->send(new \App\Mail\Mail($details));  //Sending mail to user
        \Mail::to($adminEmail)->send(new \App\Mail\Mail($details));  //Sending mail to admin

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
