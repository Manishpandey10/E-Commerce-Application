<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Client\ResponseSequence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class SignupController extends Controller
{
    public function index()
    {
        return view('frontend.userauth.signup');
    }
    public function registeruser(Request $request)
    {
        $request->validate([
            'username' => 'required',
            "email" => "required|email|unique:users,email|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.com$/",
            "password" => "required|min:6|confirmed",
            "password_confirmation" => "required",
            "phone" => 'required',
            "profileimage" => 'required|image|mimes:jpg,jpeg,png'
        ]);
     
        $newuser = new User();
        $newuser->username = $request->username;
        $newuser->email = $request->email;
        $newuser->password = Hash::make($request->password);
        $newuser->phone = $request->phone;
        $newuser->profileimage = $request->file('profileimage')->store('profileimage', 'public');
        $newuser->save();

        return redirect()->route('user.login')->with([
            "registerSuccess" => "User has been registred successfully!! Login to Proceed"
        ])->withInput();
    }
}
