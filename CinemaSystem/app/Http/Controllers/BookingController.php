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
                try {
                        // Validate Request
                        $validator = Validator::make($request->all(), [
                                'id' => 'required',
                        ]);
                        if ($validator->fails()) {
                                return response()->json([
                                    'error' => $validator->errors()
                                ])->setStatusCode(400);
                        }

                        //Get and Check Booking Exists
                        $booking = Booking::find($request->input('id'));
                        if ($booking == null) {
                                return response()->json([
                                        'error' => 'Booking Not Found'
                                ]);
                        }


                        //Process Seat Changes

                        //Get Seat Arrays
                        $requestedSeats = $request->input('requested_seats');
                        $removedSeats = $request->input('removed_seats');

                        //If More Seats Requested Check Availibility 
                        if ($requestedSeats > 0) {
                                //Check Seat Availability and If Exists
                                
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
                                
                        }

                        //If There Are Seats to Be Removed Check they Exist in DB 
                        if ($removedSeats > 0) {
                                foreach($removedSeats as $removedSeat) {
                                        //Find Booked Seat
                                        $bookedSeatInDB = BookedSeat::find($removedSeat);
                                        if ($bookedSeatInDB == null) {
                                                return response()->json([
                                                        'error' => 'One of the Booked Seats You Tried to Remove Could Not Be Found'
                                                ])->setStatusCode(404);  
                                        }
                                        
                                }
                        }

                        //Create and Save Seats
                        if ($requestedSeats > 0) {
                                foreach($requestedSeats as $bookedSeat) {
                                        $seat = new BookedSeat;
                                        $seat->booking_id = $booking->id;
                                        $seat->seat_id = $bookedSeat;
                                        $seat->showing_id = $booking->showing_id;
                                        $seat->save(); 
                                }
                        }
                        //Remove Seats
                        if ($removedSeats > 0) {
                                foreach($removedSeats as $removedSeat) {
                                        $seatToDelete = BookedSeat::find($removedSeat);
                                        $seatToDelete->delete();
                                }
                        }

                        return response()->json([
                                'Message' => 'Booking Updated'
                        ])->setStatusCode(200);


                }
                catch (Throwable $error) {
                        return response()->json([
                                'error' => $error
                        ])->setStatusCode(500);
                }
        }
    
        //Delete Booking
        public function delete(Request $request) {
                return 'Booking Delete Called';
        }
}
