<?php

namespace App\Http\Controllers;

use App\Models\Rooms;
use Illuminate\Http\Request;

class userRoomController extends Controller
{
    public function index()
    {
        //
        $rooms = Rooms::all();
        return(view('user.home', compact('rooms')));

    }
}
