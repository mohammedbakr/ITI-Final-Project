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

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


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

Route::get('/admin', function(){

    return view('admin.dashboard');

})->middleware(['auth', 'admin'])->name('dashboard');


Route::namespace('Admin')->prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function(){
        Route::resource('/users', 'UsersController')->except(['create', 'store', 'show']);
});



