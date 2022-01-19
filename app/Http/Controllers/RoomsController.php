<?php

namespace App\Http\Controllers;

use App\Models\Rooms;
use Illuminate\Http\Request;

class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data= Rooms::all();
        return(view('admin.dashboard', ['rooms' => $data]));
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
        $validatedData = $request->validate([
            'primaryImg' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        // $primaryImageName = time().'.'.$request->bookPrimaryImg->extension();
        $primaryImageName = $request->file('primaryImg')->getClientOriginalName();
        $primaryImagePath = $request->file('primaryImg')->store('public/images');

        $request->primaryImg->move(public_path('images'), $primaryImageName);

        $rooms = new Rooms();
        $rooms->roomName = $request->get('name');
        $rooms->roomType = $request->get('roomType');
        $rooms->primaryImgPath = $primaryImagePath;
        $rooms->primaryImg = $primaryImageName;


        $rooms->save();

        return redirect('image-upload')->with('status', 'Image Has been uploaded');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rooms  $rooms
     * @return \Illuminate\Http\Response
     */
    public function show(Rooms $rooms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rooms  $rooms
     * @return \Illuminate\Http\Response
     */
    public function edit(Rooms $rooms)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rooms  $rooms
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rooms $rooms)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rooms  $rooms
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rooms $rooms)
    {
        //
    }
}
