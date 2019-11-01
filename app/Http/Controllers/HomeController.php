<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Flight;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        // $starts = Flight::select('from')->groupBy('from')->pluck('from');
        $country_list = DB::table('flights')->groupBy('from')->get();

        return view('pages.index', compact('country_list'));
    }
}
