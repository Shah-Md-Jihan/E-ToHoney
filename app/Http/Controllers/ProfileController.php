<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Hash;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    function index(){
        return view('admin.profile.index');
    }

    function profilepost(Request $request){
        $request->validate([
            'name'=>'required'
        ]);
        User::find(Auth()->id())->update([
            'name'=>$request->name
        ]);
        return back()->with('profile_update_message', 'Profile updated successfully!');
    }

    function passwordpost(Request $request){
        $request->validate([
            'current_password'=> 'required',
            'password'=> 'required|confirmed',
            'password_confirmation'=> 'required'
        ]);

        $current_password_input = $request->current_password;
        $current_password_db = Auth::user()->password;

        if(Hash::check($current_password_input, $current_password_db)){
            User::find(Auth::id())->update([
                'password'=>Hash::make($request->password)
            ]);
            return back()->with('Password_update_message','Your password updated successfully');
        }
        else{
            return back()->with('old_password_error', "You have entered wrong password!");
        }

    }
}
