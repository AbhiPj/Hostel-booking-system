<?php

namespace App\Http\Controllers;

use App\Models\Bookings;
use App\Models\Customer;
use App\Models\Featured;
use App\Models\Hostels;
use App\Models\Rooms;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use DateTime;
use function PHPUnit\Framework\isNull;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //Redirecting users to their respective home page after checking role
        if(Auth::User()->userType == 'user')
        {
//            return redirect("/user");
            return view('user.home');
        }
        elseif (Auth::User()->userType == 'admin')
        {
            //Getting hostel Id
            $id = Auth::id();
            $hostel = Hostels::where('userId','=',$id)->first();
            $hostelId= $hostel->id;

            //Getting customers this month
            $customerMonth = Customer::whereMonth('created_at', date('m'))
                ->whereYear('created_at', date('Y'))
                ->get(['customer_name','created_at','roomId']);
            $rooms=Rooms::all();    //Getting all room data

            //Calculating the total earning this month
            $customerMonthSum=0;
            $countCustomers=count($customerMonth);
            foreach ($customerMonth as $checkin)
            {
                foreach ($rooms as $room)
                {
                    if ($checkin->roomId == $room->id)
                    {
                        $customerMonthSum = $customerMonthSum + $room->price;
                    }
                }
            }

            $bookingp= DB::table('bookings')
                ->select(DB::raw("month(created_at) date"), DB::raw('count(id) as total'))
                ->groupBy('date')
                ->get();

            $date=[];
            $total=[];

            if (isNull($bookingp)){
                $i=0;
                foreach ($bookingp as $b){
                    $i++;
                    $dateObj   = DateTime::createFromFormat('!m', $b->date);
                    $monthName = $dateObj->format('F');
                    $date[$i] = [
                        'date'     => $monthName,
                    ];
                    $total[$i] = [
                        'total'      => $b->total,
                    ]; }
                $this->date = $date;
                $this->total = $total;
            }

            $customerDate=[];
            $customerTotal=[];

            //Getting customer data by each month
            $customers= DB::table('customers')
                ->select(DB::raw("month(created_at) date"), DB::raw('count(id) as total'))
                ->groupBy('date')
                ->get();

            // Splitting month and total customers to display on graph
            if (isNull($customers))
            {
                $j=0;
                foreach ($customers as $customer){
                    $j++;
                    //Converting date into month
                    $dateObj   = DateTime::createFromFormat('!m', $customer->date);
                    $monthName = $dateObj->format('F'); // March
                    $customerDate[$j] = [
                        'cdate'     => $monthName,
                    ];
                    $customerTotal[$j] = [
                        'ctotal'      => $customer->total,
                    ]; }
                $this->cdate = $customerDate;
                $this->ctotal = $customerTotal;
            }


            $booking = Bookings::where('hostelId','=',$hostelId)->orderBy('id','DESC')->get();

            //getting available rooms
            $hostel = Hostels::where('userId','=',$id)->first();
            $hostelId= $hostel->id;
            $availableRooms= Rooms::where('hostelId','=',$hostelId)->where('roomStatus','=','available')->get();


//            $booking = Bookings::orderBy('id','DESC')->get();
            $totalBooking= count($booking);
            $totalPrice=0;

            foreach($booking as $bookingPrice)
            {
                $totalPrice= $bookingPrice['price'] + $totalPrice;
            }
                return view('admin.home', compact('totalBooking','totalPrice','booking','availableRooms','date','total','customerMonthSum','countCustomers','customerDate','customerTotal'));
        }
        elseif(Auth::User()->userType == 'superadmin')
        {
            $activeHostels = Hostels::where('hostelStatus','=','active')->get();
            $hostelRequests = Hostels::where('hostelStatus','=','pending')->orderBy('id','DESC')->get();
            $featuredHostels =Featured::all();


            $activeHostelsCount =count($activeHostels);
            $hostelRequestsCount =count($hostelRequests);
            $featuredCount = count($featuredHostels);
            return view("superadmin.dashboard", compact('activeHostelsCount','hostelRequestsCount','hostelRequests','featuredCount'));

        }
    }

}
