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
        if(Auth::check())
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
        else
        {
            return View::make('errors.401');
        }
    }

    public function edit(Request $request)
    {
        // Getting formdata
        $input = $request->all();

        // Validation
        $validator = Validator::make($request->all(), [
            'name'         => 'required|regex:/([A-Za-z0-9 ])+/|max:100|min:6|unique:loops,name,'.$input['id'],
            'loop_path'      => 'mimes:mpga',
            'category'      => 'required|max:1',
            'tags'      => 'required|max:5'
        ]);

        if ($validator->fails()) 
        {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        // Find loop to update
        $loop = Loop::findOrFail($input['id']);

        // Update name and category
        $loop->name = $input['name'];
        $categoryId = $input['category'];
        $loop->FK_category_id = $categoryId;

        // File check
        if ($request->hasFile('file'))
        {
            $loopPath = $loop->loop_path;
            $filePath = str_replace('/', '\\', $loopPath);
            // Delete original mp3
            unlink(base_path().'\\public'.$filePath);

            $file = $request->file('file');           
            $fileName = Auth::user()->email.'-'. $loop->name.'.'.$file->getClientOriginalExtension();
            $file->move(base_path().'/public/loops/uploads/',$fileName);
            $loop->loop_path = '/loops/uploads/'.$fileName;
        }

        // Reset tags
        $currentTags = LoopTag::where('FK_loop_id', '=', $loop->id)->get(); 
        foreach($currentTags as $currentTag) 
        {
            $currentTag->delete();
        }

        // Update tags to loop
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

        $loop->save();

        $categories = Category::orderby('name', 'ASC')->get();  
        $tags = Tag::orderBy('name', 'ASC')->lists('name', 'id');

        return redirect()->back()->with('success','Loop successfully edited!')
                                 ->with('loop', $loop)
                                 ->with('tags', $tags)
                                 ->with('categories', $categories);
    }

    public function upload(Request $request)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'name'         => 'required|regex:/^[a-zA-Z1-9 ]+$/|max:35|min:6|unique:loops,name',
            'mp3'      => 'required|mimes:mpga|max:500',
            'category'      => 'required|max:1',
            'tags'      => 'max:5'
        ]);
        

        if ($validator->fails()) 
        {
            return redirect()->back()
                        ->with('loopUploadValidationError', '')
                        ->withErrors($validator)
                        ->withInput();
        }

        $input = $request->all();

        $loop = new Loop();
        $loop->name = $input['name'];
        $loop->FK_user_id = Auth::user()->id;

        $categoryId = $input['category'];
        $loop->FK_category_id = $categoryId;
        
        // File check and creating upload map
        if ($request->hasFile('mp3'))
        {
            $file = $request->file('mp3');            
            $fileName = Auth::user()->email.'-'. $loop->name.'.'.$file->getClientOriginalExtension();
            $file->move(base_path().'/public/loops/uploads/',$fileName);
            $loop->loop_path = '/loops/uploads/'.$fileName;
        }

        $loop->save();

        // Add tags to loop
        if(array_key_exists('tags', $input))
        {
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

    public function deleteLoop($id)
    {
        $loop = Loop::findOrFail($id);

        //Only remove when it's your own loop
        if($loop->user->id == Auth::user()->id)
        {
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

            return redirect('/station')->with('success','Guitar loop '.$loop->name.' is successfully deleted!');
        }


    }
}