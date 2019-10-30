<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DynamicDependentController extends Controller
{

    public function __construct(){
        
        $this->middleware('auth')->except('index');
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
}
