<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Auth;
use Response;
use View;
use App\Loop;
use App\Favourite;

class ProfileController extends Controller
{

    public function index()
    {
        $user = User::with('loops');

        //$user = Auth::user();

        return View::make('profile')->with('user', $user);
    }

    public function getFavouriteLoops()
    {
        if(Auth::check())
        {
            $loops = Loop::with('favourites')->
                           with('user')->
                           with('category')->
                           with('tags')->
                           where('FK_user_id', '=', Auth::user()->id)->
                           orderBy('created_at', 'DESC')->get();

            $favouritedLoops = array();

            //give property to say wether it is favourited or not        
            foreach($loops as $loop) 
            {
                //check if logged in user has favourited this
                $user_favorites = Favourite::where('FK_user_id', '=', Auth::user()->id)
                    ->where('FK_loop_id', '=', $loop->id)
                    ->first();

                if ($user_favorites == null)
                {
                    $loop->isFavourite = false;
                } 
                else 
                {
                    $loop->isFavourite = true;
                    array_push($favouritedLoops, $loop);
                }
            }

            return Response::json($favouritedLoops);
        }

    }
    
}
