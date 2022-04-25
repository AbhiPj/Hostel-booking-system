<?php

namespace App\Http\Controllers;

use App\Models\Hostels;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HostelsController extends Controller
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
    public function index()
    {
        //
        if(Auth::User()->userType == 'superadmin') {
            $hostels = Hostels::all();
            return view('superadmin.viewHostel', compact('hostels'));
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
        if(Auth::User()->userType == 'superadmin') {
            $data = Hostels::all();
            $user = \App\Models\User::all();
            return (view('superadmin.addHostels', ['hostels' => $data]));
        }
        return redirect('/home');
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
        $validatedData = $request->validate([
            'primaryImg' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'roomImg.*' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        // $primaryImageName = time().'.'.$request->bookPrimaryImg->extension();
        $primaryImageName = $request->file('primaryImg')->getClientOriginalName();
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
        $hostels->userId = $request->get('userId');
//        $hostels->roomType = $request->get('roomType');
        $hostels->about=$request->get('about');
        $hostels->hostelStatus="active";
        $hostels->location=$request->get('location');
        $hostels->district=$request->get('district');
        $hostels->primaryImg = $primaryImageName;
        $secondaryImgNames = implode(",",$secondaryImgs);
        $hostels->additionalImages = $secondaryImgNames;

        $hostels->save();

        return redirect()->route('hostels.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hostels  $hostels
     * @return \Illuminate\Http\Response
     */
    public function show(Hostels $hostels)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hostels  $hostels
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::User()->userType == 'superadmin') {
            $hostels = Hostels::find($id);
            return view('superadmin.editHostel', compact('hostels'));
        }
        return redirect('/home');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hostels  $hostels
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $hostels=Hostels::find($id);
        $hostels->hostelName = $request->get('hostelName');
        $hostels->userId = $request->get('userId');
//        $hostels->roomType = $request->get('roomType');
        $hostels->about=$request->get('about');
        $hostels->location=$request->get('location');
        $hostels->district=$request->get('district');

        if($request->hasfile('primaryImg')){
            $primaryImageName = $request->file('primaryImg')->getClientOriginalName();
            $request->primaryImg->move(public_path('images'), $primaryImageName);
            $hostels->primaryImg = $primaryImageName;
        }

        $secondaryImgs = [];
        if($request->hasfile('roomImg'))
        {
            foreach($request->file('roomImg') as $img)
            {
                $secondaryImgName = $img->getClientOriginalName();
                $img->move(public_path('images'), $secondaryImgName);
                $secondaryImgs[] = $secondaryImgName;
                $secondaryImgNames = implode(",",$secondaryImgs);
                $hostels->additionalImages = $secondaryImgNames;
            }
        }
        $hostels->save();

        return redirect()->route('hostels.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hostels  $hostels
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if(Auth::User()->userType == 'superadmin') {
            $hostelDel = Hostels::find($id);
            $userId = $hostelDel->userId;
            $user = \App\Models\User::find($userId);
            $user->userType="user";
            $user->save();
            $hostelDel->delete();
            return redirect()->route('hostels.index');
        }
        return redirect('/home');
    }
}
