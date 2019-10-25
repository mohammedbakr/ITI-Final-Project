<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware(['auth' ,'verified']);



// admin dashboard
Route::get('/admin', function(){

    return view('admin.dashboard');

})->middleware(['auth', 'admin'])->name('dashboard');


Route::namespace('Admin')->prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function(){
        Route::resource('/users', 'UsersController')->except(['create', 'store', 'show']);
        Route::resource('/flights' ,'FlightsController')->except(['create', 'show']);
});

// Home Page
Route::get('/', 'Users\FlightsController@index')->name('index');
Route::get('/dests', 'Users\FlightsController@destination')->name('dests');
Route::get('/deps', 'Users\FlightsController@departure')->name('deps');
Route::post('/data', 'Users\FlightsController@store')->name('data');

Route::middleware('verified')->group(function(){

	// contact page
	Route::get('/contact', 'pagesController@contact')->name('contact');
	
});