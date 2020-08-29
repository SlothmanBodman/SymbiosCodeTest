<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    //Link Movie to Showings
    public function showings() {
        $this->hasMany('App\Showing', 'movie_id', 'id');
    }
}
