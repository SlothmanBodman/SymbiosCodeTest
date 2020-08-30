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
        try {
            
            //Find Existing Customer
            $customer = Customer::find($request->input('id'));
            if ($customer == null) {
                return response()->json([
                    'error' => "Customer Not Found"
                ])->setStatusCode(404);
            }
            
            //Validate
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|unique:customers,email,'.$request->input('id'),
                'name' => 'required'
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'error' => $validator->errors()
                ])->setStatusCode(400);
            }

            //Update and Save
            $customer->email = $request->input('email');
            $customer->name = $request->input('name');
            $customer->save();

            //Return Success Message
            return response()->json([
                'Message' => 'Customer Updated'
            ])->setStatusCode(200);

    
        }
        catch (Throwable $error) {
            //Return Error Message
            return response()->json([
                'error' => $error 
            ])->setStatusCode(500);
        }
    }

    //Delete Customer
    public function delete(Request $request) {
        try {
            //Find Existing Customer
            $customer = Customer::find($request->input('id'));
            if ($customer == null) {
                return response()->json([
                    'error' => "Customer Not Found"
                ])->setStatusCode(404);
            }

            //Delete the Customer
            $customer->delete();

            //Return Success Message
            return response()->json([
                'Message' => 'Customer Deleted'
            ])->setStatusCode(200);
        }
        catch (Throwable $error) {
            //Return Error Message
            return response()->json([
                'error' => $error 
            ])->setStatusCode(500);
        }
    }

}
