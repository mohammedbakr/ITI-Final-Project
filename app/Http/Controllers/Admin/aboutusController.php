<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Aboutus;

class aboutusController extends Controller
{
    public function aboutus(){

        return view('admin.aboutus');
    }

    public function store(Request $request){

        $aboutus = new Aboutus();

        $aboutus->title = $request->input('title');
        $aboutus->description = $request->input('description');
        $aboutus->body = $request->input('body');
        $aboutus->save();

        return redirect('aboutus')->with('status', 'Data Added for About Us ');
    }
}
