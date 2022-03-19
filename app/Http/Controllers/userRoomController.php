<?php

namespace App\Http\Controllers;

use App\Models\Bookings;
use App\Models\Hostels;
use App\Models\review;
use App\Models\Rooms;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class userRoomController extends Controller
{
    public function index()
    {
        //
        $rooms = Rooms::all();
        return(view('user.home', compact('rooms')));

    }

    public function viewHostel($id){
        $hostel = Hostels::find($id);

        $featureArr = explode(',',$hostel->features );
        $rooms = Rooms::where('hostelId','=',$id)->get();
        $reviews = review::all();
        $users = User::all();
        return(view('user.hostelDetail', compact('hostel','id','rooms','featureArr','reviews','users')));
    }

    public function viewRoom($id){
        $rooms = Rooms::find($id);
        return(view('user.roomDetail', compact('rooms','id')));
    }

    public function bookRoom($roomId){
        $rooms = Rooms::find($roomId);
        $userId = Auth::id();

        $booking = new Bookings();
        $booking->userId=$userId;
        $booking->roomId=$roomId;
        $booking->price=$rooms->price;
        $booking->paymentStatus="paid";
        $booking->save();
        return(view('user.home'));
    }

    public function viewHostels()
    {
//        return(view('user.hostels'));
        $hostels= Hostels::where('hostelStatus','=','active')->get();
        return view('user.hostels',compact('hostels'));
    }

    public function searchHostel(Request $request)
    {
        $hostelName = $request->get('hostelSearch');
        $hostels = Hostels::where('hostelName', 'LIKE', "%{$hostelName}%")->get();
        return view('user.hostels',compact('hostels'));
    }
}
