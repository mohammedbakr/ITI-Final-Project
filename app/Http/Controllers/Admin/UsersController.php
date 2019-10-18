<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Role;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->hasRole('admin')){

            return view('admin.users.index')->with('users', User::paginate(10));
            
        } else {

            return redirect()->route('dashboard');
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();

        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([

            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required'
        ]);


        $user = User::find($id);
        $user->update($request->all());

        $user->roles()->sync($request->roles);

        return redirect()->route('admin.users.index')->with('success', 'User Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if($user->hasRole('admin')){

            return redirect()->route('admin.users.index')->with('error', 'This user cant be Deleted'); 
        }

        $user->roles()->detach();
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User Deleted successfully');
          
    }
    
}
