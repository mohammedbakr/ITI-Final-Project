<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Flight;
use App\Booking;
use Illuminate\Support\Facades\Auth;

class FlightsController extends Controller
{

    public function __construct(){
        
        $this->middleware('auth');
    }


    public function index(){
    	$flights = Flight::all();
        $starts = Flight::select('from')->groupBy('from')->pluck('from');


    	return view('pages.index', compact('flights', 'starts'));
    }

    public function destination(Request $request){
        $from = $request->input('from');
        if (! $from ){
            abort(404);
        }
        $dests = Flight::where(['from'=>$from])->select('to')->groupBy('to')->pluck('to');
        return $dests;
    }

    public function departure(Request $request){
        $from = $request->input('from');
        $to = $request->input('to');
        if (! $from ){
            abort(404);
        }

        $deps = Flight::where(['from'=>$from, 'to'=>$to])->first();
        return $deps;
    }

    public function store(Request $request){
        Booking::where(['user_id'=>Auth::user()->id])
        ->where(['flight_id'=>$request->flight_id])
        ->where(['seats'=>$request->input('seats')])
        ->delete();
        $booking = new Booking;
        $booking->seats = $request->input('seats');
        $booking->user_id = Auth::user()->id;
        $booking->flight_id = $request->flight_id;

        $booking->save();
        return ['status'=> 'success'];

    }

    
}
