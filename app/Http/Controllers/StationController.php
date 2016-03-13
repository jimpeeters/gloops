<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use View;

class StationController extends Controller
{
    public function index()
    {
        return View::make('station');
    }
}
