<?php

namespace App\Http\Controllers\PolicyController\PrivacyPolicyController;

use App\Http\Controllers\Controller;
use App\Models\PrivacyPolicy;
use Illuminate\Http\Request;

class UpdatePolicyController extends Controller
{
    public function privacy()
    {
        
        $data = PrivacyPolicy::first();
        // dd($data);
        return view('policies.privacyPolicy', compact('data'));
    }
    public function updateprivacy(Request $request,$id ){
        $request->validate([
            'privacypolicy'=>'nullable'
        ]);
        $updatedPolicy = PrivacyPolicy::find($id);
        
        $updatedPolicy->privacyPolicy = $request->privacypolicy;
        // dd($updatedPolicy);

        $updatedPolicy->save();
        return response()->json([
            'status'=>'success',
            'updatePrivacyPolicy'=>'Privacy policy has been updated!!'
        ]);
        // return redirect()->back()->with('updatePrivacyPolicy','Privacy policy has been updated!!');
    }
    public function exchange()
    {
        return view('policies.exchangePolicy');
    }
    
}
