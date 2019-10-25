<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\DatabaseNotify;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $admin = User::find(1);
        $admin->notify( new DatabaseNotify);

        $author = User::find(2);
        $author->notify( new DatabaseNotify);

        return view('pages.index');
    }
}
