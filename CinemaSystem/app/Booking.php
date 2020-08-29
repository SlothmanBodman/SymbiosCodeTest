<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    //Link Booking to a Showing
    public function showing() {
        $this->hasOne('App\Showing', 'id', 'showing_id');
    }
    //Link Booking to a Customer
    public function customer() {
        $this->belongsTo('App\Customer', 'id', 'customer_id');
    }
    //Link Booking to It's booked seats
    public function seats() {
        $this->hasMany('App\BookedSeat', 'booking_id', 'id');
    }
}
