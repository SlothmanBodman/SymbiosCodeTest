<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Screen extends Model
{
    //Link Screen to Seats
    public function seats() {
        $this->hasMany('App\Seat', 'screen_id', 'id');
    }
    //Link Screen to Showings
    public function showings() {
        $this->hasMany('App\Showing', 'screen_id', 'id');
    }
}
