<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

//Models
use App\Showing;
use App\Movie;
use App\Screen;

class ShowingController extends Controller
{
    //Create Showing
    public function create(Request $request) {
        try {
            //Validate Request
            $validator = Validator::make($request->all(), [
                'movie_id' => 'required',
                'screen_id' => 'required',
                'start_time' => 'required|date'
            ]);
            if ($validator->fails()) {
                return reponse()->json([
                    'error' => $validator->errors()
                ])->setStatusCode(400);
            }
            //Check Related Data Exists
            //Movie
            $movie = Movie::find($request->input('movie_id'));
            if ($movie == null) {
                return response()->json([
                    'error' => 'Movie Not Found'
                ])->setStatusCode(404);
            }
            //Customer
            $screen = Screen::find($request->input('screen_id'));
            if ($screen == null) {
                return response()->json([
                    'error' => 'Screen Not Found'
                ])->setStatusCode(404);
            }

            //Create and Save Showing
            $showing = new Showing;
            $showing->movie_id = $request->input('movie_id');
            $showing->screen_id = $request->input('screen_id');
            $showing->start_time = $request->input('start_time');
            $showing->save();


            //Return Success Message
            return response()->json([
                'Message' => 'Showing Saved'
            ])->setStatusCode(200);

        } catch (Throwable $error) {
            //Return Error Message
            return reponse()->json([
                'error' => $error
            ])->setStatusCode(500);
        }
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
