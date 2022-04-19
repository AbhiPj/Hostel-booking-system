<?php

namespace App\Http\Controllers;

use App\Models\Featured;
use App\Models\Hostels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FeaturedController extends Controller
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
        if(Auth::User()->userType == 'superadmin') {

            $hostels = Hostels::where('hostelStatus', '=', 'active')->get();
            $featured = Featured::all();
            $hostelsFeatured = Featured::join('hostels', 'hostels.id', '=', 'featureds.hostelId')->get();
            return view('superadmin.featuredHostel', compact('hostelsFeatured', 'hostels', 'featured'));
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $featured = new Featured();
        $featured->hostelId=$request->get('featured');
        $featured->save();
        return redirect()->route('featured.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Featured  $featured
     * @return \Illuminate\Http\Response
     */
    public function show(Featured $featured)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Featured  $featured
     * @return \Illuminate\Http\Response
     */
    public function edit(Featured $featured)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Featured  $featured
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Featured $featured)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Featured  $featured
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::User()->userType == 'superadmin') {
            $featuredHostel = Featured::Where('hostelId', '=', $id);
            $featuredHostel->delete();
            return redirect()->route('featured.index');
        }
        return redirect('/home');
    }
}
