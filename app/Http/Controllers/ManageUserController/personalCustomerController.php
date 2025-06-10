<?php

namespace App\Http\Controllers\ManageUserController;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class personalCustomerController extends Controller
{
    public function index(){
        
        $users = User::all();
        // dd($users);
        return view('managecustomers.personalCustomers.index', compact('users'));
    }

}
