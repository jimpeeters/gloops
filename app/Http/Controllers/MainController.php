<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Response;
use App\Loop;
use App\Tag;
use App\Favourite;
use Auth;

class MainController extends Controller
{
    public function searchOnTags($query) {

        $searchResult = Loop::whereHas('tags', function ($q) use ($query) {
				            $q->where('name', 'LIKE', '%'. $query .'%');  
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
            foreach($searchResult as $loop) 
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

    	return Response::json($searchResult);
    }

    public function searchOnCategory($query) {

        $searchResult = Loop::whereHas('category', function ($q) use ($query) {
				            $q->where('name', 'LIKE', '%'. $query .'%');  
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
            foreach($searchResult as $loop) 
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

    	return Response::json($searchResult);
    }
}