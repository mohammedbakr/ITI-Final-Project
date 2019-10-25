<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pagesController extends Controller
{
    
    public function destination(){

        return view('pages.destination');
    }

    public function pricing(){

        return view('pages.pricing');
    }

    public function contact(){

        return view('pages.contact');
    }
}
