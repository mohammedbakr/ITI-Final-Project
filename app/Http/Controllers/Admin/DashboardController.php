<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;


class DashboardController extends Controller
{
    // show all users
    public function register(){

        $users = User::all();

        return view('admin.users')->with('users', $users);
    }

    // edit user profile
    public function usersedit(Request $request, $id){
        
        $users = User::findOrFail($id);
        return view('admin.usersedit')->with('users', $users);
    }

    // submit the edit for profile (update the profile)
    public function usersupdate(Request $request, $id){

        $users = User::find($id);
        $users->name = $request->input('username');
        $users->usertype = $request->input('usertype');
        $users->update();

        return redirect('/users')->with('status', 'The Profile Updated');
    }

    // delete user profile
    public function usersdelete($id){

        $users = User::findOrFail($id);
        $users->delete();
        return redirect('/users')->with('status', 'The Profile Deleted');
    }


}
