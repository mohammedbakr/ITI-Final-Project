<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aboutus extends Model
{
    public $table = 'abouts';

    public $fillable = ['title', 'description', 'body'];
}
