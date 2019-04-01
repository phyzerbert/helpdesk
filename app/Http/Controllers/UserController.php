<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;

class UserController extends Controller
{
    public function profile(Request $request){
        $user = Auth::user();
        $current_page = 'profile';
        
        $data = array(
            'user' => $user,
            'current_page' => $current_page
        );
        return view('profile', $data);
    }

    public function updateuser(Request $request){
        $request->validate([
            'name'=>'required',
            'firstname'=>'required',
            'lastname'=>'required',
            'phone'=>'required'
        ]);
        $user = User::find($request->get("id"));
        $user->name = $request->get("name");
        $user->firstname = $request->get("firstname");
        $user->lastname = $request->get("lastname");
        $user->phone = $request->get("phone");

        if($request->get('newpassword') != ''){
            $user->password = Hash::make($request->get('newpassword'));
        }
        $user->update();
        return back()->with("success", "Updated User Successfully.");
    }
}
