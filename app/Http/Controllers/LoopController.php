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

        if ($favouriteCheck == null) 
        {
            // Favourite this loop
            $favourite = new Favourite();
            $favourite->FK_loop_id = $input['loopId'];
            $favourite->FK_user_id =  Auth::user()->id;
            $favourite->save();

            // Don't influence rating when it's your own loop
            if($owner->id != Auth::user()->id)
            {
                // Increase users rating
                $ownersRating = $ownersRating + 1;
                $owner->rating = $ownersRating;

                // Check for rank
                if($ownersRating < 20) {
                    $owner->rank = 1;
                }
                else if($ownersRating >= 20 && $ownersRating < 50) {
                    $owner->rank = 2;
                }
                else if($ownersRating >= 50 && $ownersRating < 100) {
                    $owner->rank = 3;
                }
                else if($ownersRating >= 100 && $ownersRating < 500) {
                    $owner->rank = 4;
                }
                else if($ownersRating >= 500 ) {
                    $owner->rank = 5;
                }

                $owner->save();
            }
        }
        else 
        {
            // Remove favourited
            $favouriteCheck->delete();

            // Don't influence rating when it's your own loop
            if($owner->id != Auth::user()->id)
            {
                // Decrease users rating
                $ownersRating --;
                $owner->rating = $ownersRating;

                // Check for rank
                if($ownersRating < 20) {
                    $owner->rank = 1;
                }
                else if($ownersRating >= 20 && $ownersRating < 50) {
                    $owner->rank = 2;
                }
                else if($ownersRating >= 50 && $ownersRating < 100) {
                    $owner->rank = 3;
                }
                else if($ownersRating >= 100 && $ownersRating < 250) {
                    $owner->rank = 4;
                }
                else if($ownersRating >= 250 ) {
                    $owner->rank = 5;
                }

                $owner->save();
            }
        }
    }

}
