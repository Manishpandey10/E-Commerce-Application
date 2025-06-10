<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserSignUpController extends Controller
{
    public function index()
    {
        return view('frontend.Users.auth.userSignUp');
    }
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required',
            "email" => "required|email|unique:users,email|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.com$/",
            "password" => "required|min:6|confirmed",
            "password_confirmation" => "required",
            "phone" => 'required',
            "profileimage" => 'required|image|mimes:jpg,jpeg,png'
        ]);
        $newUser = new User();
        $newUser->username = $request->username;
        $newUser->email = $request->email;
        $newUser->password = Hash::make($request->password);
        $newUser->phone = $request->phone;
        $newUser->profileimage = $request->file('profileimage')->store('userPicture', 'public');
        // dd($newUser);
        $newUser->save();
        return redirect()->route('user.login')->with([
            "registerSuccess" => "User has been registred successfully!! Login to Proceed"
        ])->withInput();
    }
}
