<?php

namespace App\Http\Controllers;

use App\Models\MembershipDetails;
use Illuminate\Http\Request;

class MembershipDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $memberDetails = MembershipDetails::all();
        return view('admin.addMemberPrice',compact('memberDetails'));
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
        $membershipDetails = new MembershipDetails();

        $membershipDetails->duration = $request->input('duration');
        $membershipDetails->price = $request->input('membershipPrice');
        $membershipDetails->save();


        return redirect()->route('membershipDetails.index');
//        return redirect()->route('rooms.create');
//        $memberDetails1 = MembershipDetails::all();
//        return view('admin.addMemberPrice',compact('memberDetails1'));


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MembershipDetails  $membershipDetails
     * @return \Illuminate\Http\Response
     */
    public function show(MembershipDetails $membershipDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MembershipDetails  $membershipDetails
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $membershipDetails = MembershipDetails::find($id);
        return view('admin.editMembershipPrice',compact('membershipDetails'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MembershipDetails  $membershipDetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $membership_detail = MembershipDetail::find($id);
        $membership_detail->price = $request->get('price');
        $membership_detail->save();

        return redirect()->route('membershipDetails.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MembershipDetails  $membershipDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $room = MembershipDetails::find($id);
        $room->delete();
        return redirect()->route('membershipDetails.index');
    }
}
