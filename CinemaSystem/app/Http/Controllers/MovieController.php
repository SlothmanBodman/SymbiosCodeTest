<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    //Create Movie
    public function create(Request $request) {
        return 'Movie Create Called';
    }

    //Update Movie
    public function update(Request $request) {
        return 'Movie Update Called';
    }

    //Delete Movie
    public function delete(Request $request) {
        return 'Movie Delete Called';
    }
}
