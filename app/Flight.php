<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Booking;

class Flight extends Model
{
    
    public $fillable = ['from', 'to', 'departure_date', 'arrival_date', 'time', 'price', 'available_seats'];


    protected $dates = ['departure_date', 'arrival_date'];
    

    public function users(){
    	return $this->belongsToMany('App\User');
    }


    public function used_seats() {
    	
    	return Booking::where(['flight_id'=>$this->id])->count();
    }


}
