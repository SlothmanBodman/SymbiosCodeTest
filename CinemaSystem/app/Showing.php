<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Showing extends Model
{
    //Link Showing to Movie
    public function Movie() {
        $this->belongsTo('App\Movie', 'id', 'movie_id');
    }

    //Link Showing to Screen
    public function screen() {
        $this->belongsTo('App\Screen', 'id', 'screen_id');
    }
}
