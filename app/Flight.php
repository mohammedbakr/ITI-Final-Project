<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
	
    public $fillable = ['from', 'to', 'departure_date', 'arrival_date', 'time', 'price', 'available_seats'];

    public function flight_details(){
    	return $this->hasMany('App\Flight_Detail');
    }


    public function users(){
    	return $this->belongsToMany('App\User');
    }
}
