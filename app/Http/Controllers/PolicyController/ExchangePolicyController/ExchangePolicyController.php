<?php

namespace App\Http\Controllers\PolicyController\ExchangePolicyController;

use App\Http\Controllers\Controller;
use App\Models\ExchangePolicy;
use Illuminate\Http\Request;

class ExchangePolicyController extends Controller
{
    public function exchange(){
        $data = ExchangePolicy::first();
        // dd($data);
        return view('policies.exchangePolicy',compact('data'));
    }
    public function updateExchangePolicy(Request $request, $id){
        $request->validate([
            "exchange_policy"=>'nullable'
        ]);
        $updatedpolicy = ExchangePolicy::find($id);
        
        $updatedpolicy->exchange_policy= $request->exchange_policy;
        // dd($updatedpolicy);
        $updatedpolicy->save();
        return response()->json([
            'status'=>'success',
            'updateExchangePolicy'=>'Exchange policy has been updated.'
        ]);
        // return redirect()->back()->with('updateExchangePolicy','Exchange policy has been updated.');
    }

}
