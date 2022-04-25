<?php

namespace App\Http\Controllers;

use App\Models\Hostels;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
//        return(view('admin.roomType'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $id = Auth::id();
        $hostel = Hostels::where('userId','=',$id)->first();
        $hostelId= $hostel->id;


        $data = RoomType::where('hostelId','=', $hostelId)->get();
        return view('admin.roomType',compact('data'));
//        return(view('admin.roomType'));

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
        $id = Auth::id();
        $hostel = Hostels::where('userId','=',$id)->first();
        $hostelId= $hostel->id;
        $roomType = new RoomType();
        $roomType->roomType = $request->get('roomType');
        $roomType->hostelId= $hostelId;
        $roomType->save();
        return redirect()->route('roomType.create')->with('success','Added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function show(RoomType $roomType)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $room=RoomType::find($id);
        return view('admin.editRoomType',compact('room'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $userId = Auth::id();
        $hostel = Hostels::where('userId','=',$userId)->first();
        $hostelId= $hostel->id;
        $roomType=RoomType::find($id);
        $roomType->roomType = $request->get('editRoomType');
        $roomType->hostelId =$hostelId;
        $roomType->save();
        return redirect()->route('roomType.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $delete_roomType=RoomType::find($id);
        $delete_roomType->delete();

        return redirect()->route('roomType.create');
    }

    public function roomDelete(Request $request)
    {
        //
        $id = $request->id;
        $delete_roomType = RoomType::find($id);
        $delete_roomType->delete();
        return redirect()->route('roomType.create');
    }
}
