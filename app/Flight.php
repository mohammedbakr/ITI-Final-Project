<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Booking;
class Flight extends Model
{
	
    public $fillable = ['from', 'to', 'departure_date', 'arrival_date', 'time', 'price'];

    public function flight_details(){
    	return $this->hasMany('App\Flight_Detail');
    }


    public function users(){
    	return $this->belongsToMany('App\User');
    }
    public function used_seats() {
    	
    	return Booking::where(['flight_id'=>$this->id])->count();
    }


    
}
