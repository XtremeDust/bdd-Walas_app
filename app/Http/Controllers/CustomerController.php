<?php

namespace App\Http\Controllers;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function customer(){
        $customer = Customer::with('user')->get();
        return response()->json($customer);
    }

}
