<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    public function passenger(){
    	return $this->hasOne('App\Passenger');
    }

    public function flight_detail(){
    	return $this->belongsTo('App\Flight_Detail');
    }

    
}
