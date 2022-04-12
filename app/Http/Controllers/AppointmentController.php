<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isNull;
use RealRashid\SweetAlert\Facades\Alert;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        return view('user.appointment',compact('id'));
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
        $appointmentFind = Appointment::where('userId','=',$userId)->where('hostelId','=',$id)->first();

        //checking if appointment already exists before making appointment request
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
        $appointments = Appointment::all();
        return view('admin.viewAppointments',compact('appointments'));
    }

    public function requestAppointment()
    {
        $appointments = Appointment::where('appointment_status','=','pending')->get();
        return view('admin.appointmentRequests',compact('appointments'));
    }

    public function activateRequestAppointment($id)
    {
        $appointment = Appointment::find($id);
        $appointment->appointment_status="approved";
        $appointment->save();
        return redirect()->back();
    }
}
