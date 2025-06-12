<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLoginController extends Controller
{
    public function index()
    {
        return view('frontend.Users.auth.userLogin');
    }
    public function verifyUser(Request $request)
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
            // return redirect()->route('user.dashboard');
            if (Auth::user()->role_id == 2) {
                return redirect()->route('user.dashboard');
            } elseif (Auth::user()->role_id == 1) {
                return redirect()->route('dashboard');
            }
        }

        return redirect()->back()->with("userError", "Invalid credentials, Please enter correct details!!");
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('user.login')->with('logoutMessage', "You've been logged out!. Please log in again to continue.");
    }
}
