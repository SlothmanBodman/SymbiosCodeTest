<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //Create Customer
    public function create(Request $request) {
        return 'Customer Create Called';
    }

    //Update Customer
    public function update(Request $request) {
        return 'Customer Update Called';
    }

    //Delete Customer
    public function delete(Request $request) {
        return 'Customer Delete Called';
    }
}
