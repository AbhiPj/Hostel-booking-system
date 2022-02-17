<?php

namespace App\Http\Controllers;

use App\Models\Bookings;
use App\Models\Rooms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userRoomController extends Controller
{
    public function index()
    {
        //
        $rooms = Rooms::all();
        return(view('user.home', compact('rooms')));

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
        return(view('user.newPage'));
    }
}
