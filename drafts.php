<?php

//              FlightsController methods:
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    
    

    

    //              routes(web.php)

    // Route::get('/', function () {
//     return view('home');
// });
    
// admin panel (ui kit admin)
// Route::group(['middleware' => ['auth']], function(){

//     Route::get('/dashboard', function () {
//         return view('admin.dashboard');
//     });

//     Route::get('/users', 'Admin\DashboardController@register')->name('users');

//     Route::get('/users/{id}', 'Admin\DashboardController@usersedit');

//     Route::put("/users-update/{id}", 'Admin\DashboardController@usersupdate');

//     Route::delete('/users-delete/{id}', 'Admin\DashboardController@usersdelete');

//     Route::get('/aboutus', 'Admin\aboutusController@aboutus');

//     Route::post('aboutus-save', 'Admin\aboutusController@store');

//     // haven't created yet 
//     Route::get('/flights' ,'Admin\flightsController@show');

// });




// Route::get('/', 'Users\FlightsController@index')->name('index');
// Route::get('/dests', 'Users\FlightsController@destination')->name('dests');
// Route::get('/deps', 'Users\FlightsController@departure')->name('deps');
// Route::post('/data', 'Users\FlightsController@store')->name('data');




<?php

// namespace App\Http\Controllers\Users;

// use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;
// use App\Flight;
// use App\Booking;
// use Illuminate\Support\Facades\Auth;

// class FlightsController extends Controller
// {

    // public function __construct(){
        
    //     $this->middleware('auth')->except('index');
    // }


//     public function index(){
//     	$flights = Flight::all();
//         $starts = Flight::select('from')->groupBy('from')->pluck('from');


//     	return view('pages.index', compact('flights', 'starts'));
//     }

//     public function destination(Request $request){
//         $from = $request->input('from');
//         if (! $from ){
//             abort(404);
//         }
//         $dests = Flight::where(['from'=>$from])->select('to')->groupBy('to')->pluck('to');
//         return $dests;
//     }

//     public function departure(Request $request){
//         $from = $request->input('from');
//         $to = $request->input('to');
//         if (! $from ){
//             abort(404);
//         }

//         $deps = Flight::where(['from'=>$from, 'to'=>$to])->first();
//         return $deps;
//     }

//     public function store(Request $request){
//         Booking::where(['user_id'=>Auth::user()->id])
//         ->where(['flight_id'=>$request->flight_id])
//         ->where(['seats'=>$request->input('seats')])
//         ->delete();
//         $booking = new Booking;
//         $booking->seats = $request->input('seats');
//         $booking->user_id = Auth::user()->id;
//         $booking->flight_id = $request->flight_id;

//         $booking->save();
//         return ['status'=> 'success'];

//     }

    
// }
