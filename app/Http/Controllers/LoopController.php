<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Favourite;
use Auth;
use App\Loop;
use App\User;

class LoopController extends Controller
{
    public function index()
    {
        
    }

    public function favourite(Request $request)
    {
    	$input = $request->all();

        //Check if it is already favourite
        $favouriteCheck = Favourite::where('FK_loop_id', '=', $input['loopId'])->first();


        // Get owner of loop and his rating
        $loop = Loop::find($input['loopId']);
        $owner = User::find($loop->FK_user_id);
        $ownersRating = $owner->rating;

        if ($favouriteCheck === null) 
        {
            // Not favourited yet
            $favourite = new Favourite();
            $favourite->FK_loop_id = $input['loopId'];
            $favourite->FK_user_id =  Auth::user()->id;
            $favourite->save();

            // Don't influence rating when it's your own loop
            if($owner->id != Auth::user()->id)
            {
                // Increase users rating
                $ownersRating ++;
                $owner->rating = $ownersRating;
                $owner->save();
            }
            
        }
        else 
        {
            // Favourited
            $favouriteCheck->delete();

            // Don't influence rating when it's your own loop
            if($owner->id != Auth::user()->id)
            {
                // Decrease users rating
                $ownersRating --;
                $owner->rating = $ownersRating;
                $owner->save();
            }
        }
    }

}
