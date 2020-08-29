<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookedSeat extends Model
{
    //Link Booked Seat to a Booking
    public function booking() {
        return $this->hasOne('App\Booking', 'id', 'booking_id');
    }
    //Link Booked Seat to Seat
    public function seat() {
        return $this->hasOne('App\Seat', 'id', 'seat_id');
    }
}
