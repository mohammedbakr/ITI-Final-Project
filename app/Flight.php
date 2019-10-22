<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
	protected $fillable = [
		'from', 'to', 'departure_date', 'arrival_date', 'price'
	];


    public function flight_details(){
    	return $this->hasMany('App\Flight_Detail');
    }


    public function users(){
    	return $this->belongsToMany('App\User');
    }
}
