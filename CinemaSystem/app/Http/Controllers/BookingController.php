<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
        //Create Booking
        public function create(Request $request) {
                return 'Booking Create Called';
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
