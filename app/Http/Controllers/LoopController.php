<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Favourite;
use Auth;

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

        if ($favouriteCheck === null) 
        {
            $favourite = new Favourite();
            $favourite->FK_loop_id = $input['loopId'];
            $favourite->FK_user_id =  Auth::user()->id;
            $favourite->save();
        }
        else 
        {
            $favouriteCheck->delete();
        }
    }

}
