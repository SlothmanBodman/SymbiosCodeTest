<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //Link Customer to Bookings
    public function bookings() {
        $this->hasMany('App\Booking', 'customer_id', 'id');
    }
}
