<?php

namespace App\Http\Controllers;

use App\Models\Bookings;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
//        return view('user.home');
//          return view('home');
        if(Auth::User()->userType == 'user'){
//            return view('user.home');
            return redirect("/user");
        }elseif (Auth::User()->userType == 'admin'){


            $booking = Bookings::orderBy('id','DESC')->get();
            $totalBooking= count($booking);
            $totalPrice=0;

            foreach($booking as $bookingPrice){
                $totalPrice= $bookingPrice['price'] + $totalPrice;
            }
                return view('admin.home', compact('totalBooking','totalPrice','booking'));
        }

    }

}
