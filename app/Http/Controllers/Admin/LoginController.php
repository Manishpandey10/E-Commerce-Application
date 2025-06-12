<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('frontend.userauth.login');
    }
    public function verifylogin(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required',
            ],
            [
                'email.required' => 'Please enter valid email',
                'password.required' => 'Password is required',
            ]
        );

        if (Auth::attempt(
            [
                'email' => $request->email,
                'password' => $request->password
            ]
        )) {
            if (Auth::user()->role_id == 1) {
                return redirect()->route('dashboard')->with('loginSuccess','Login successfull, welcome to your dashboard!!');
            }
            else if(Auth::user()->role_id ==2 ){
            return redirect()->back()->with('AdminError', "You're not an admin!");
            }
        }
        return redirect()->back()->with("userError", "Invalid credentials, Please enter correct details!!");
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('logoutMessage', "You've been logged out!. Please log in again to continue.");
    }
}
