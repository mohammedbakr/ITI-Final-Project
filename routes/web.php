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


// Github login
Route::get('login/github', 'Auth\LoginController@redirectToProvider')->name('login/github');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');



// admin dashboard
Route::get('/admin', function(){

    return view('admin.dashboard');

})->middleware(['auth', 'admin'])->name('dashboard');


Route::namespace('Admin')->prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function(){
        Route::resource('/users', 'UsersController')->except(['create', 'store', 'show']);
        Route::resource('/flights' ,'FlightsController')->except(['create', 'show']);
        Route::get('markAsRead', 'NotifyController@notify')->name('markRead');
});

// Home Page
Route::get('/', 'DynamicDependentController@index')->name('index');
Route::get('/returnFlight', 'DynamicDependentController@returnFlight')->name('returnFlight');
Route::post('/fetch', 'DynamicDependentController@fetch')->name('index.fetch');
Route::post('/store', 'DynamicDependentController@store')->name('store');


Route::middleware('verified')->group(function(){

	// contact page
	Route::get('/contact', 'pagesController@contact')->name('contact');
	
	Route::post('/contact', 'pagesController@store')->name('contactUs');
});