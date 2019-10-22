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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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