<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use View;
use App\Loop;
use App\Favourite;
use Response;
use Auth;

class HomeController extends Controller
{
    public function index()
    {
        return View::make('home');
    }

    public function getBestLoops()
    {
    	$bestLoops = Loop::leftJoin('favourites','loops.id','=','favourites.FK_loop_id')->
               selectRaw('loops.*, count(favourites.FK_loop_id) AS `count`')->
               with('favourites')->
               with('user')->
               with('category')->
               with('tags')->
               groupBy('loops.id')->
               orderBy('count','DESC')->take(4)->get();



        //only do this check when user is logged in (else you dont have favourites)
        if(Auth::check())
        {
            foreach($bestLoops as $loop) 
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

    	return Response::json($bestLoops);
    }
}
