<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    //Link Seat to a Screen
    public function screen() {
        $this->belongsTo('App\Screen', 'id', 'screen_id');
    }
}
