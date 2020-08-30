<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

//Models
use App\Customer;

class CustomerController extends Controller
{
    //Create Customer
    public function create(Request $request) {
        try {
            
            //Validate
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|unique:customers',
                'name' => 'required'
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'error' => $validator->errors()
                ])->setStatusCode(400);
            }

            //Map to Model and Save in DB
            $customer = new Customer;
            $customer->email = $request->input('email');
            $customer->name = $request->input('name');
            $customer->save();

            //Return Success Message
            return response()->json([
                'Message' => 'Customer Saved'
            ])->setStatusCode(200);


        } catch (Throwable $error) {
            //Return Error Message
            return response()->json([
                'error' => $error 
            ])->setStatusCode(500);

        }
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
