<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Flight;
use App\Booking;
use App\Credit;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class DynamicDependentController extends Controller
{

    public function __construct(){
        
        $this->middleware(['auth', 'verified'])->except('index');
    }

    
    function index(){

        $country_list = DB::table('flights')->groupBy('from')->get();

        return view('pages.index')->with('country_list', $country_list);

    }

    function fetch(Request $request){

        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = DB::table('flights')->where($select, $value)->groupBy($dependent)->get();

        $output = '<option value="">Select '.ucfirst($dependent).'</option>';
        
        foreach($data as $row){

            $output.='<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
            
        }

        echo $output;
    }


    function returnFlight(Request $request){
        $from = $request->input('from');
        $to = $request->input('to');
        $departure_date = $request->input('departure_date');
        if (! $from ){
            abort(404);
         }

         $flight = Flight::where(['from'=>$from, 'to'=>$to, 'departure_date'=>$departure_date])->first();

         return $flight;
    }

    function store(Request $request){


            $this->validate($request, [
                'cname' => 'required|string',
                'ccnum' => 'required|integer',
                'expdate' => 'required|date',
                'cvv' => 'required|integer'
            ]);

            $credit = new Credit;
            $credit->cname = $request->cname;
            $credit->ccnum = $request->ccnum;
            $credit->expdate = Carbon::createFromFormat('m/d/Y', $request->input('expdate'))->format('Y-m-d');
            $credit->cvv = $request->cvv;
            $credit->user_id = Auth::user()->id;

            $credit->save();




         $book = new Booking;
         $book->flight_id = $request->flight_id;
         $book->user_id = Auth::user()->id;
         $book->credit_id = $credit->id;

         $book->save();
         

         return response()->json(['success' => 'Credit Added Successfuly' , 'id' => $credit->id ]);

    }

}
