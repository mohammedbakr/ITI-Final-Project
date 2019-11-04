<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class pagesController extends Controller
{
    
    public function contact(){

        return view('pages.contact');
    }


    public function store(Request $request){

    	$data = $request->validate([

    		'name' => 'required',
    		'email' => 'required|email',
    		'subject' => 'required',
    		'message' => 'required|min:100'
    	]);


    	Mail::to('test@test.com')->send(new ContactFormMail($data));

    	return redirect()->route('index');

    }
}
