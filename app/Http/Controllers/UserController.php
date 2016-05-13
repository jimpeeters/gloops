<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Loop;
use Auth;
use Response;
use View;
use App\Favourite;

class UserController extends Controller
{

    public function getUser()
    {
        $user = Auth::user();
        return Response::json($user);
    }

    public function getSpecificUser($name) 
    {
    	$user = User::where('name', '=', $name)->first();

    	if(Auth::check())
        {
        	// If you go to yourself, go to profile page
	    	if($user->id == Auth::user()->id)
	    	{
	    		return View::make('profile');
	    	}
	    	else
	    	{
	    		return View::make('specific-user')->with('user', $user);
	    	}
	    }
	    else
	    {
	    	return View::make('specific-user')->with('user', $user);
	    }

    }

    public function getSpecificUserLoops($id)
    {
		$loops = Loop::whereHas('user', function ($q) use ($id) {
				            $q->where('id', '=', $id);  
				        })->leftJoin('favourites','loops.id','=','favourites.FK_loop_id')->
		                selectRaw('loops.*, count(favourites.FK_loop_id) AS `count`')->
		                with('favourites')->
		                with('user')->
		                with('category')->
		                with('tags')->
		                groupBy('loops.id')->
		                orderBy('count','DESC')->get();


		// Give property to say wether it is favourited or not        
        foreach($loops as $loop) 
        {
            // Check if logged in user has favourited this
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
            }
        }

		return Response::json($loops);
    }
}
