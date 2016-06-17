<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Favourite;
use Auth;
use App\Loop;
use App\User;
use View;
use Response;

class LoopController extends Controller
{
    public function index()
    {
        
    }

    public function favourite(Request $request)
    {
    	$input = $request->all();

        //Check if it is already favourite
        $favouriteCheck = Favourite::where('FK_loop_id', '=', $input['loopId'])
                                    ->where('FK_user_id', '=', Auth::user()->id)
                                    ->first();

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
                $ownersRating ++;
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

    public function getSpecificLoopPage($name) 
    {
        $loop = Loop::where('name', '=', $name)->first();
        return View::make('specific-loop')->with('loop', $loop);
    }


    public function getSpecificLoop($id) 
    {

        $loop = Loop::with('favourites')->
                        with('user')->
                        with('category')->
                        with('tags')->findOrFail($id);

        //only do this check when user is logged in (else you dont have favourites)
        if(Auth::check())
        {
            //check if logged in user has favourited this
            $user_favorites = Favourite::where('FK_user_id', '=', Auth::user()->id)
                ->where('FK_loop_id', '=', $loop->id)
                ->first();

            //give property to say wether it is favourited or not
            if ($user_favorites == null)
            {
                $loop->isFavourite = false;
            } 
            else 
            {
                $loop->isFavourite = true;
            }
        }

        return Response::json($loop);
    }

    public function getSpecificTagPage($name) 
    {
        return View::make('specific-tag')->with('tagname', $name);
    }

    public function getLoopsFromTag($name) 
    {

        $loops = Loop::whereHas('tags', function ($q) use ($name) {
                    $q->where('name', 'LIKE', $name);  
                })->
                leftJoin('favourites','loops.id','=','favourites.FK_loop_id')->
                selectRaw('loops.*, count(favourites.FK_loop_id) AS `count`')->
                with('favourites')->
                with('user')->
                with('category')->
                with('tags')->
                groupBy('loops.id')->
                orderBy('count','DESC')->get();

        //only do this check when user is logged in (else you dont have favourites)
        if(Auth::check())
        {
            foreach($loops as $loop) 
            {
                //check if logged in user has favourited this
                $user_favorites = Favourite::where('FK_user_id', '=', Auth::user()->id)
                    ->where('FK_loop_id', '=', $loop->id)
                    ->first();

                //give property to say wether it is favourited or not
                if ($user_favorites == null)
                {
                    $loop->isFavourite = false;
                } 
                else 
                {
                    $loop->isFavourite = true;
                }

            }
        }

        return Response::json($loops);
    }

}
