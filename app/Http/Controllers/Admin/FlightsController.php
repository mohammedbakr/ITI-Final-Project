<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Flight;
use Carbon\Carbon;

class FlightsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if($request->search){

                $flight = Flight::when($request->search, function($q) use ($request){

                    return $q->where('from', 'like' , '%' . $request->search . '%');

                })->latest()->paginate(4);

                return view('admin.flights.index', compact('flight'));

            } else {

                $flight = Flight::latest()->paginate(6);

                return view('admin.flights.index', compact('flight'));
            }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([

            'from' => 'required|string',
            'to' => 'required|string',
            'departure_date' => 'required|date' ,
            'arrival_date' => 'required|date',
            'time' => 'required',
            'price' => 'required|integer',
            'available_seats' => 'required|integer',

        ]);

        $flight = new Flight;
        $flight->from = $request->input('from');
        $flight->to = $request->input('to');
        $flight->departure_date = Carbon::createFromFormat('m/d/Y', $request->input('departure_date'))->format('Y-m-d');
        $flight->time = $request->input('time');
        $flight->price = $request->input('price');
        $flight->arrival_date = Carbon::createFromFormat('m/d/Y', $request->input('arrival_date'))->format('Y-m-d');
        $flight->available_seats = $request->input('available_seats');

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

            'from' => 'required|string',
            'to' => 'required|string',
            'departure_date' => 'required|date' ,
            'arrival_date' => 'required|date',
            'time' => 'required',
            'price' => 'required|integer',
            'available_seats' => 'required|integer',

        ]);

        $flight = Flight::find($id);
        $flight->from = $request->input('from');
        $flight->to = $request->input('to');
        $flight->departure_date = Carbon::createFromFormat('m/d/Y', $request->input('departure_date'))->format('Y-m-d');
        $flight->time = $request->input('time');
        $flight->price = $request->input('price');
        $flight->arrival_date = Carbon::createFromFormat('m/d/Y', $request->input('arrival_date'))->format('Y-m-d');
        $flight->available_seats = $request->input('available_seats');


        $flight->update();

        // $flight->update($request->all());

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
