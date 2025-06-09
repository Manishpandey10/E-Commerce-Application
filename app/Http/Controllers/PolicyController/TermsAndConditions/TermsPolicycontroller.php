<?php

namespace App\Http\Controllers\PolicyController\TermsAndConditions;

use App\Http\Controllers\Controller;
use App\Models\TermsCondition;
use Illuminate\Http\Request;

class TermsPolicycontroller extends Controller
{
    public function terms(){
        $data = TermsCondition::get()->first();
        // dd($data);
         return view('policies.termsAndConditions',compact('data'));
    }
    public function updateterms(Request $request,){
        $request->validate([
            "terms_condition"=>"nullable"
        ],
    [
        'terms_condition.required'=>'Terms and condition cannot be empty!!'
    ]);
    $data = TermsCondition::get()->first();
    $data->terms_condition = $request->terms_condition;
    // dd($data->terms_condition);
    $data->save();
    return response()->json([
        'status'=>'success',
        'termSuccess'=>'Terms and conditions updated successfully!!'
    ]);
    return redirect()->back()->with('termSuccess','Terms and conditions updated successfully!!');
    }
}
