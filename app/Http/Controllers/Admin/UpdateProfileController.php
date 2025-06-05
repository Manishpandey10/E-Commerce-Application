<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateProfileController extends Controller
{
    public function index()
    {
        return view('frontend.profileForms.updateprofile');
    }

    public function updateuser(Request $request){
    //    dd("dd hit");
        $request->validate([
            'username'=>'required',
            'email'=>'required|email|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.com$/',
            "phone" => 'required',
            "profileimage" => 'nullable|image|mimes:jpg,jpeg,png'
        ],[
            'username.required'=>'Full Name field is Required',
            'email.required'=>'Email field is Required',
            'phone.required'=>'Phone no field is Required',
        ]);
        
        $id = Auth::id();
        
        $updateuser = User::find($id);
        
        $updateuser->update([
            "username"=>$request->username,
            "email"=>$request->email,
            "phone"=>$request->phone,
        ]);
        if($request->hasFile('profileimage')){
            $updateuser->profileimage = $request->file('profileimage')->store('profileimage','public');
        }
        $updateuser->save();
        return response()->json(['status'=>'success', "updateMsg"=>"User profile details updated succesfully"]);
        // return redirect()->back()->with("updateMsg","User profile details updated succesfully")->withInput();

    }
}
