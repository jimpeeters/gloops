<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use View;
use App\Loop;
use Auth;

class StationController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $loops = Loop::where('FK_user_id' , '=' , Auth::user()->id)->get();

            return View::make('station')->with('loops', $loops);
        }
        else {
            return View::make('station');
        }
    }

/*    public function getData()
    {
    	if (Auth::check()) {
			$loops = Loop::where('FK_user_id' , '=' , Auth::user()->id)->get();
			return Response::json($loops);
    	}
    }*/
}
