<?php

namespace App\Http\Controllers;

use App\Models\Hostels;
use App\Models\RequestHostel;
use App\Models\User;
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
        $requestHostels = Hostels::where('hostelStatus','=','pending')->get();
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
        $allHostels = Hostels::all();
        foreach ($allHostels as $item){
            if($item->userId == $userId){
                return redirect('/user')->with('exists','Already exists');
            }
        }

        $validatedData = $request->validate([
            'primaryImg' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'roomImg.*' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $primaryImageName = $request->file('primaryImg')->getClientOriginalName();
        $primaryImagePath = $request->file('primaryImg')->store('public/images');
        $request->primaryImg->move(public_path('images'), $primaryImageName);
        $secondaryImgs = [];
        if($request->hasfile('roomImg'))
        {
            foreach($request->file('roomImg') as $img)
            {
                // $secondaryImgName = $request->file('img')->getClientOriginalName();
                $secondaryImgName = $img->getClientOriginalName();
                $img->move(public_path('images'), $secondaryImgName);
                $secondaryImgs[] = $secondaryImgName;
            }
        }


        $hostels = new Hostels();
        $hostels->hostelName = $request->get('hostelName');
        $hostels->userId = $userId;
        $hostels->about=$request->get('hostelDescription');
        $hostels->hostelStatus="pending";
        $hostels->location=$request->get('location');
        $hostels->features=$request->get('features');
        $hostels->latitude=$request->get('latitude');
        $hostels->longitude=$request->get('longitude');


        $hostels->district=$request->get('district');
        $hostels->primaryImg = $primaryImageName;
        $secondaryImgNames = implode(",",$secondaryImgs);
        $hostels->additionalImages = $secondaryImgNames;

        $hostels->save();

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
    public function edit(Hostels $hostels, $id)
    {
        //
        $hostels=Hostels::find($id);
        dd($hostels);
        return view('superadmin.editHostel',compact('hostels'));

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

    public function activateHostel($id)
    {

        $activateHostel = Hostels::find($id);
        $activateHostel->hostelStatus="active";
        $activateHostel->save();

        $userId= $activateHostel->userId;
        $user = User::find($userId);
        $user->userType="admin";
        $user->save();

        return redirect()->route('hostels.index');


    }
}
