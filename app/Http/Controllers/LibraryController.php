<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Favourite;
use App\Loop;
use Auth;
use View;
use Response;

class LibraryController extends Controller
{
    public function index()
    {
        return View::make('library');
    }

    public function getLoops()
    {
        $loops = Loop::leftJoin('favourites','loops.id','=','favourites.FK_loop_id')->
               selectRaw('loops.*, count(favourites.FK_loop_id) AS `count`')->
               with('favourites')->
               with('user')->
               with('category')->
               with('tags')->
               groupBy('loops.id')->
               orderBy('count','DESC')->
               orderBy('created_at', 'DESC')->get();

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
