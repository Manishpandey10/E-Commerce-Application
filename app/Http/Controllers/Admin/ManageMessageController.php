<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ManageMessageController extends Controller
{
    public function index(){
        $data = ContactUs::all();
        // dd($data);
        return view('products.manageMessages', compact('data'));
    }
    public function submit(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'description'=>'required'
        ],
    [
        'name.required'=>'Name field is required.',
        'email.required'=>'Email field is required.',
        'description.in'=>'Message field is required.'
    ]);

        $newMsg = new ContactUs();
        $newMsg->name = $request->name;
        $newMsg->email = $request->email;
        $newMsg->description = $request->description;

        // dd($newMsg);
        $newMsg->save();
        return redirect()->route('contact.page');
    }
    public function delete($id){
        $data = ContactUs::find($id);
        // dd($data);
        
        $data->delete();

        return response()->json([
            "status"=>"success",
            "messageDeleted"=>"The message has been delted"

        ]);

        // return redirect()->route('products.manageMessages');
    }
}
