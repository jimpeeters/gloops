<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Auth;
use Response;

class UserController extends Controller
{

    public function getUser()
    {
        $user = Auth::user();
        return Response::json($user);
    }
    
}
