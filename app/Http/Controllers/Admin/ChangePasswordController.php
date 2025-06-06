<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function index(){
        return view('frontend.profileForms.changePassword');
    }
    public function changepassword(Request $request){
         $request->validate([
            'cur_password' => 'required|min:6',
            'new_password' => 'required|min:6', 
            'password_confirmation' => 'required|same:new_password',
        ], [
            'cur_password.required' => 'Current password field is required',
            'cur_password.min' => 'Password should be atleast 6 characters long',
            'new_password.required' => 'New password field is required',
            'new_password.min' => 'Password should be atleast 6 characters long',
            'password_confirmation.required' => 'Please confirm your new password',
            'password_confirmation.same' => 'Confirm Password and New Password values does not match',
        ]);
        $user = Auth::User();

        if(!Hash::check($request->cur_password, $user->password)){
            return redirect()->back()->with('changePasswordError','Old password does not match.');
        }    
        $user->password = Hash::make($request->new_password);
        $user->save();

        return response()->json([
            'status'=>'success',
            'changepasswordSuccess'=>'Password has been updated successfully!!'
        ]);
        // return redirect()->back()->with('changepasswordSuccess','Password has been updated successfully!!');
    }
}
