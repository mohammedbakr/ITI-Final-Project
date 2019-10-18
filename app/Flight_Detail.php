<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flight_Detail extends Model
{
    public  function tickets(){
    	return $this->hasMany('App\Ticket');
    }

    public function flight(){
    	return $this->belongsTo('App\Flight');
    }
}
