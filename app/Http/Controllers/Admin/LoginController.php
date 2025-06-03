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
            return redirect()->route('dashboard')->with('loginSuccess', "Log in successfull, welcome to dashboard")->withInput();
        } else {
            return redirect()->back()->with('loginError', "Invalid credentials, Please enter correct details!!");
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('logoutMessage', "You've been logged out!. Please log in again to continue.");
    }
}
