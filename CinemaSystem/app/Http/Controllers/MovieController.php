<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

//Models
use App\Movie;
use App\Showing;
use App\Booking;
use App\BookedSeat;

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
        
        try {
            //Find Existing Movie
            $movie = Movie::find($request->input('id'));
            if ($movie == null) {
                return response()->json([
                    'error' => 'Movie Not Found'
                ])->setStatusCode(404);
            }

            //Validate
            $validator = Validator::make($request->all(), [
                'name' => 'required'
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'error' => $validator->errors()
                ])->setStatusCode(400);
            }

            //update and Save
            $movie->name = $request->input('name');
            $movie->save();

            //Return Success Message
            return response()->json([
                'Message' => 'Movie Updated'
            ])->setStatusCode(200);

        } catch (Throwable $error) {
            //Return Error Message
            return response()->json([
                    'error' => $error 
            ])->setStatusCode(500);
        }
    }

    //Delete Movie
    public function delete(Request $request) {
        try {
            //Find Existing Movie
            $movie = Movie::find($request->input('id'));
            if ($movie == null) {
                return response()->json([
                    'error' => 'Movie Not Found'
                ])->setStatusCode(404);
            }

            //Delete the Movie
            $movie->delete();

            //Return Success Message
            return response()->json([
                'Message' => 'Movie Deleted'
            ])->setStatusCode(200);
            

        } catch (Throwable $error) {
            return response()->json([
                "error" => $error
            ])->setStatusCode(500);
        }
    }
}
