<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use View;
use App\Loop;
use App\Favourite;
use Response;
use Auth;

class RecordController extends Controller
{
    public function index()
    {
        return View::make('record');
    }
}
