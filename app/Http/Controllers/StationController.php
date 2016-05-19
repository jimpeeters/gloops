<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use App\Loop;
use App\Category;
use App\Tag;
use App\LoopTag;
use App\Favourite;
use Auth;
use Validator;
use Redirect;
use Response;
use Storage;

class StationController extends Controller
{
    public function index()
    {

        $categories = Category::orderby('name', 'ASC')->get();  
        $tags = Tag::orderBy('name', 'ASC')->lists('name', 'id');

        return View::make('station')->with('tags' , $tags)
                                    ->with('categories', $categories);
    }

    public function getEdit($id)
    {
        $loop = Loop::with('favourites')->
                        with('user')->
                        with('category')->
                        with('tags')->findOrFail($id);

        // Check is this loop is from logged in user
        if(Auth::user()->id != $loop->FK_user_id)
        {
            return View::make('errors.401');
        }
        else
        {
            $tags = Tag::orderBy('name', 'ASC')->lists('name', 'id');
            $categories = Category::orderby('name', 'ASC')->get();

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

            return View::make('station-edit')->with('loop', $loop)
                                             ->with('tags', $tags)
                                             ->with('categories', $categories);
        }
    }

    public function edit(Request $request)
    {

    }

    public function upload(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'name'         => 'required|alpha_num|max:100|min:6|unique:loops,name',
            'loop_path'      => 'mimes:mpga,wav',
            'category'      => 'required|max:1',
            'tags'      => 'required|max:5'
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

        $categoryId = $input['category'];
        $loop->FK_category_id = $categoryId;
        
        //File check and creating upload map
        if ($request->hasFile('file'))
        {
            $file = $request->file('file');            
            $fileName = Auth::user()->email.'-'. $loop->name.'.'.$file->getClientOriginalExtension();
            $file->move(base_path().'/public/loops/uploads/',$fileName);
            $loop->loop_path = '/loops/uploads/'.$fileName;
        }

        $loop->save();

        //add tags to loop
        $tags = $input['tags']; 
        if (isset($tags))
        {
            foreach($tags as $tag) 
            {
                $specificTag =  Tag::where('name', '=', $tag)->first();

                $loopTag = new LoopTag;
                $loopTag->FK_loop_id = $loop->id;
                $loopTag->FK_tag_id = $specificTag->id;
                $loopTag->save();
            }
        }

        return redirect('/station')->with('success','Loop successfully added!');
    }

    public function getUserLoops()
    {
        if(Auth::check())
        {
            $loops = Loop::where('FK_user_id' , '=' , Auth::user()->id)->
                           with('favourites')->
                           with('user')->
                           with('category')->
                           with('tags')->
                           orderBy('created_at', 'DESC')->get();

            //give property to say wether it is favourited or not        
            foreach($loops as $loop) 
            {
                //check if logged in user has favourited this
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

    public function deleteLoop(Request $request)
    {
        $input = $request->all();
        $loop = Loop::findOrFail($input['loopId']);

        $loopPath = $loop->loop_path;

        //Remove all connections with tags
        foreach ($loop->loopTags as $tag)
        {
          $tag->delete();
        }

        //Remove all connections with favourites
        foreach ($loop->loopFavourites as $favourite)
        {
          $favourite->delete();
        }

        $loop->delete();

        //Remove file from public folder
        $loopPath = str_replace('/', '\\', $loopPath);
        unlink(base_path().'\\public'.$loopPath); 

        //return redirect('/station')->with('success','Guitar loop '.$loop->name.' is successfully deleted!');
    }
}