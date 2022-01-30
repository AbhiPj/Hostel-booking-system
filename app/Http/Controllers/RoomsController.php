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
            'roomImg.*' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        // $primaryImageName = time().'.'.$request->bookPrimaryImg->extension();
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


        $rooms = new Rooms();
        $rooms->roomName = $request->get('name');
        $rooms->roomType = $request->get('roomType');
        $rooms->primaryImg = $primaryImageName;
        $secondaryImgNames = implode(",",$secondaryImgs);
        $rooms->additionalImages = $secondaryImgNames;

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
    public function edit(Rooms $rooms,$id)
    {
        //

        $room=Rooms::find($id);
        return view('admin.editRoom',compact('room'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rooms  $rooms
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rooms $rooms,$id)
    {
        //
        $rooms=Rooms::find($id);
        $rooms->roomName=$request->get('name');
        $rooms->roomType=$request->get('roomType');
        if($request->hasfile('primaryImg')){
            $primaryImageName = $request->file('primaryImg')->getClientOriginalName();
            $request->primaryImg->move(public_path('images'), $primaryImageName);
            $rooms->primaryImg = $primaryImageName;
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
                $rooms->additionalImages = $secondaryImgNames;
            }
        }
        $rooms->save();

        return redirect('image-upload');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rooms  $rooms
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rooms $rooms, $id)
    {
        //

        $room = Rooms::find($id);
        $room->delete();
        return redirect('image-upload');

    }
}
