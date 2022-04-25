<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isNull;
use RealRashid\SweetAlert\Facades\Alert;


class AppointmentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($id)
    {
        //
        if (auth()->user()->userType == 'user') {

            return view('user.appointment', compact('id'));
        }
        return redirect('/home');
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
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $appointment = Appointment::find($id);
        $appointment->delete();
        return redirect()->back();
    }

    public function storeAppointment(Request $request,$id)
    {
        $userId =Auth::id();

        //checking if appointment already exists before making appointment request
        $appointmentFind = Appointment::where('userId','=',$userId)->where('hostelId','=',$id)->first();
        if (!$appointmentFind)
        {
            $appointment = new Appointment();
            $appointment->appointment_date = $request->get('appointmentDate');
            $appointment->appointment_status = "pending";
            $appointment->appointment_message = $request->get('appointmentMessage');
            $appointment->userId = $userId;
            $appointment->hostelId = $id;
            $appointment->save();
        }
        else
        {
            Alert::error('Warning', 'Appointment already exists');
                return redirect()->back();
        }
        Alert::success('Success', 'Appointment request sent');
        return back();
//        return view('user.home')->with('Success','Appointment request sent');
    }

    public function adminAppointment()
    {
        if (auth()->user()->userType == 'admin') {
            $appointments = Appointment::all();
            $user = User::all();

            return view('admin.viewAppointments', compact('appointments','user'));
        }
        return redirect('/home');
    }

    public function requestAppointment()
    {
        if (auth()->user()->userType == 'admin') {
            $user = User::all();
            $appointments = Appointment::where('appointment_status', '=', 'pending')->get();
            return view('admin.appointmentRequests', compact('appointments','user'));
        }
        return redirect('/home');
    }

    public function activateRequestAppointment($id)
    {
        if (auth()->user()->userType == 'admin') {

            $appointment = Appointment::find($id);
            $appointment->appointment_status = "approved";
            $appointment->save();
            return redirect()->back();
        }
        return redirect('/home');
    }
}
