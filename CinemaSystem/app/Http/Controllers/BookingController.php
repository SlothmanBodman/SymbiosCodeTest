<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Customer;
use App\Showing;
Use App\BookedSeat;
Use App\Booking;
Use App\Seat;

class BookingController extends Controller
{
        //Create Booking
        public function create(Request $request) {

                try {
                        //Validate Request Data
                        $validator = Validator::make($request->all(), [
                                'customer_id' => 'required',
                                'showing_id' => 'required',
                                'requested_seats' => 'required'
                        ]);
                        if ($validator->fails()) {
                                return response()->json([
                                    'error' => $validator->errors()
                                ])->setStatusCode(400);
                        }

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
                        //Check Seat Availability and If Exists
                        $requestedSeats = $request->input('requested_seats');
                        foreach($requestedSeats as $requestedSeat) {
                                //Check Seat Exists
                                $seatInDb = Seat::find($requestedSeat);
                                if($seatInDb == null) {
                                        return response()->json([
                                               'error' => 'Seat Not Found'
                                       ])->setStatusCode(404); 
                               }
                               //Check Not Booked
                                $doubleBookedSeat = BookedSeat::where('showing_id', $request->input('showing_id'))
                               ->where('seat_id', $requestedSeat)->first();
                               if ($doubleBookedSeat != null) {
                                        return response()->json([
                                                'error' => 'One of the Selected Seats has Been Booked'
                                        ])->setStatusCode(404);  
                              } 
                       
                        }

                        //Create and Save Booking
                        $booking = new Booking;
                        $booking->customer_id = $request->input('customer_id'); 
                        $booking->showing_id = $request->input('showing_id');
                        $booking->save();

                        //Create and Save Seats
                        foreach($requestedSeats as $bookedSeat) {
                                $seat = new BookedSeat;
                                $seat->booking_id = $booking->id;
                                $seat->seat_id = $bookedSeat;
                                $seat->showing_id = $request->input('showing_id');
                                $seat->save(); 
                        }
                
                        //Return Response
                        return response()->json([
                        'Message' => 'Booking Saved'
                        ])->setStatusCode(200); 

                } catch (Throwable $error) {
                        //Return Error Message
                        return reponse()->json([
                                'error' => $error
                        ])->setStatusCode(500);   
                }
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
