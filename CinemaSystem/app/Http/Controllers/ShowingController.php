<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShowingController extends Controller
{
    //Create Showing
    public function create(Request $request) {
        return 'Showing Create Called';
    }
    
    //Update Showing
    public function update(Request $request) {
        return 'Showing Update Called';
    }
    
    //Delete Showing
    public function delete(Request $request) {
        return 'Showing Delete Called';
    }
}
