<?php

namespace App\Http\Controllers\ManageUserController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class businessCustomerController extends Controller
{
    public function index(){
        return view('managecustomers.businessCustomers.index');
    }
}
