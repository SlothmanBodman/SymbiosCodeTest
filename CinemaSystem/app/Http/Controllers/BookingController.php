<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Customer;
use App\Showing;
Use App\BookedSeat;
Use App\Booking;

class BookingController extends Controller
{
        //Create Booking
        public function create(Request $request) {
                //Check Customer Exists
                $customer = Customer::find($request->input('customer_id'));
                if ($customer == null) {
                        return response()->json([
                                'error' => 'Customer Not Found'
                        ])->setStatusCode(404);                       
                }

                //Check Showing Exists
                $showing = Showing::find($request->input('showing_id'));
                if ($showing == null) {
                        return response()->json([
                                'error' => 'Showing Not Found'
                        ])->setStatusCode(404);   
                }
                //Check Seat Availability
                $requestedSeats = $request->input('requested_seats');
                foreach($requestedSeats as $requestedSeat) {
                        
                }

                //Create and Save Booking 


                //Create and Save Seats
                
                //Return Response

        }
    
        //Update Booking
        public function update(Request $request) {
                return 'Booking Update Called';
        }
    
        //Delete Booking
        public function delete(Request $request) {
                return 'Booking Delete Called';
        }
}
