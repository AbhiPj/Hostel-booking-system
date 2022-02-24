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
    public function edit(MembershipDetails $membershipDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MembershipDetails  $membershipDetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MembershipDetails $membershipDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MembershipDetails  $membershipDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(MembershipDetails $membershipDetails)
    {
        //
    }
}
