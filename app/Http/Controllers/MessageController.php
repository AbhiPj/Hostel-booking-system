<?php

namespace App\Http\Controllers;

use App\Models\Hostels;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $id = Auth::id();
        $hostel = Hostels::where('userId','=',$id)->first();
        $hostelId= $hostel->id;
        $user = User::all();

        $messages= Message::where('to','=',$id)->distinct()->get('from','message');
//        dd($messages);

        return view ('admin.messages',compact('messages','user'));
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
    public function store(Request $request, $toId)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }

    public function viewMessage($id)
    {
        $userId = Auth::id();

        $messageAdmin = Message::where('to','=',$userId)->where('from','=',$id);
        $messages = Message::where('from','=',$userId)->where('to','=',$id)->union($messageAdmin)->orderBy('created_at')->get();

        $user = User::all();
        return view('admin.viewMessages',compact('messages','user','id'));

    }

    public function storeMessage(Request $request, $toId)
    {
        $id = Auth::id();
        $message = new Message();
        $message->from = $id;
        $message->to=  $toId;
        $message->message= $request->get('newMessage');
        $message->save();

        return redirect()->back();
    }

    public function userMessage()
    {
        //
        $id = Auth::id();
        $user = User::all();

        $messages= Message::where('to','=',$id)->distinct()->get('from','message');

        return view ('user.messages',compact('messages','user'));
    }

    public function viewUserMessages($id)
    {
        $userId = Auth::id();

        $messageAdmin = Message::where('to','=',$userId)->where('from','=',$id);
        $messages = Message::where('from','=',$userId)->where('to','=',$id)->union($messageAdmin)->orderBy('created_at')->get();

        $user = User::all();
        return view('user.viewUserMessages',compact('messages','user','id'));
    }

    public function storeUserMessage(Request $request, $toId)
    {
        $id = Auth::id();
        $message = new Message();
        $message->from = $id;
        $message->to=  $toId;
        $message->message= $request->get('newMessage');
        $message->save();

        return redirect()->back();
    }
}
