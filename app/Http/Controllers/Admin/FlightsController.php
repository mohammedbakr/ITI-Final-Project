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

        $flight = Flight::latest()->paginate(5);

        return view('admin.flights', compact('flight'));
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

        return redirect()->route('admin.flights.index')->with('success', 'Flight Deleted successfully');
                  
    }
   
}
