<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

//Models
use App\Movie;

class MovieController extends Controller
{
    //Create Movie
    public function create(Request $request) {
        try {
            //Validate
            $validator = Validator::make($request->all(), [
                'name' => 'required'
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'error' => $validator->errors()
                ])->setStatusCode(400);
            }

            //Map to Model and Save in DB
            $movie = new Movie;
            $movie->name = $request->input('name');
            $movie->save();

            //Return Success Message
            return response()->json([
                'Message' => 'Movie Saved'
            ])->setStatusCode(200);
            
        } catch (Throwable $error) {
            //Return Error Message
            return response()->json([
                'error' => $error 
            ])->setStatusCode(500);

        }
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
