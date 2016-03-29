<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use App\Loop;
use App\Category;
use Auth;
use Validator;
use Redirect;

class StationController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $loops = Loop::where('FK_user_id' , '=' , Auth::user()->id)->get();
            $categories = ['default'=>'Choose a category'] + Category::orderby('name', 'ASC')->lists('name', 'id')->all();    

            return View::make('station')->with('loops', $loops)->with('categories', $categories);
        }
        else {
            return View::make('station');
        }
    }

    public function upload(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'name'         => 'required|max:100|min:2',
            'loop_path'      => 'mimes:mpga,wav'
        ]);
        

        if ($validator->fails()) 
        {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $input = $request->all();

        $loop = new Loop();
        $loop->name = $input['name'];
        $loop->FK_user_id = Auth::user()->id;

        $category = explode(',', $input['category']);
        $loop->FK_category_id     = $category[0];

        if ($request->hasFile('file'))
        {
            $file = $request->file('file');
            $fileName = Auth::user()->name.'.'. $loop->name.$file->getClientOriginalExtension();
            $file->move(base_path().'/public/loops/uploads/',$fileName);
            $loop->loop_path = '/loops/uploads/'.$fileName;
        }

        $loop->save();
        return redirect('/station')->with('success','Loop successfully added!');
    }


/*    public function getData()
    {
    	if (Auth::check()) {
			$loops = Loop::where('FK_user_id' , '=' , Auth::user()->id)->get();
			return Response::json($loops);
    	}
    }*/
}
