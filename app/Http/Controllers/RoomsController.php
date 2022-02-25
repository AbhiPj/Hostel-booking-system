<?php

namespace App\Http\Controllers;

use App\Models\Rooms;
use App\Models\RoomType;
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
        $rooms= Rooms::all();
        $roomType= RoomType::all();
//        dd($roomType);
        return view('admin.dashboard',compact('roomType','rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rooms= Rooms::all();
        $roomType= RoomType::all();
        return view('admin.roomTable',compact('roomType','rooms'));

//        return(view('admin.dashboard', ['rooms' => $data]));
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
        $rooms->about=$request->get('about');
        $rooms->price=$request->get('price');
        $rooms->primaryImg = $primaryImageName;
        $secondaryImgNames = implode(",",$secondaryImgs);
        $rooms->additionalImages = $secondaryImgNames;

        $rooms->save();

        return redirect()->route('rooms.create')->with('success','Added successfully');
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
//        $rooms->roomType=$request->get('roomType');
        $rooms->roomType = $request->input('roomType');

        $rooms->about=$request->get('about');
        $rooms->price=$request->get('price');

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

        return redirect()->route('rooms.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rooms  $rooms
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //

        $room = Rooms::find($id);
        $room->delete();
        return redirect()->route('rooms.create');

    }


}
