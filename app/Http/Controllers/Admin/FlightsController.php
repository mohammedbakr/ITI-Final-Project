<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Flight;

class FlightsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $flight = Flight::latest()->paginate(10);

        return view('admin.flights.index', compact('flight'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'from' => 'required',
            'to' => 'required',
            'departure_date' => 'required | date' ,
            'arrival_date' => 'required | date',
            'price' => 'required',

        ]);

        $flight = new Flight();
        $flight->from = $request->input('from');
        $flight->to = $request->input('to');
        $flight->departure_date = $request->input('departure_date');
        $flight->arrival_date = $request->input('arrival_date');
        $flight->price = $request->input('price');
        $flight->save();

        return redirect()->route('admin.flights.index')->with('success', 'Flight Added Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $flight = Flight::find($id);

        return view('admin.flights.edit', compact('flight'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([

            'from' => 'required',
            'to' => 'required',
            'departure_date' => 'required' ,
            'arrival_date' => 'required',
            'price' => 'required',

        ]);

        $flight = Flight::find($id);
        $flight->from = $request->input('from');
        $flight->to = $request->input('to');
        $flight->departure_date = $request->input('departure_date');
        $flight->arrival_date = $request->input('arrival_date');
        $flight->price = $request->input('price');
        $flight->save();

        return redirect()->route('admin.flights.index')->with('success', 'Flight Updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $flight = Flight::find($id);
        $flight->delete();

        return redirect()->route('admin.flights.index')->with('success', 'Flight Deleted Successfully');
                  
    }
   
}
