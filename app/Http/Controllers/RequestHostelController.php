<?php

namespace App\Http\Controllers;

use App\Models\RequestHostel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestHostelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('user.requestHostel');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $requestHostels = RequestHostel::all();
        return view('superadmin.viewRequests',compact('requestHostels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userId= Auth::id();
        $hostelRequest = new RequestHostel();

        $hostelRequest->hostelName = $request->get('hostelName');
        $hostelRequest->userId = $userId;
        $hostelRequest->hostelDescription = $request->get('hostelDescription');
        $hostelRequest->features = $request->get('features');
        $hostelRequest->district = $request->get('district');
        $hostelRequest->location = $request->get('location');

        $hostelRequest->save();
        return redirect('/user');





    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RequestHostel  $requestHostel
     * @return \Illuminate\Http\Response
     */
    public function show(RequestHostel $requestHostel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RequestHostel  $requestHostel
     * @return \Illuminate\Http\Response
     */
    public function edit(RequestHostel $requestHostel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RequestHostel  $requestHostel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RequestHostel $requestHostel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RequestHostel  $requestHostel
     * @return \Illuminate\Http\Response
     */
    public function destroy(RequestHostel $requestHostel)
    {
        //
    }
}
