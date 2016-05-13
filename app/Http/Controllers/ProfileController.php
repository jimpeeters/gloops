<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Auth;
use Response;
use View;
use App\Loop;
use App\Favourite;
use Validator;
use Redirect;

class ProfileController extends Controller
{

    public function index()
    {
        return View::make('profile');
    }

    public function getFavouriteLoops()
    {
        // Your favourite loops are private
        if(Auth::check())
        {
            $loops = Loop::with('favourites')->
                           with('user')->
                           with('category')->
                           with('tags')->
                           orderBy('created_at', 'DESC')->get();

            $favouritedLoops = array();

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
                    array_push($favouritedLoops, $loop);
                }
            }

            return Response::json($favouritedLoops);
        }

    }

    public function update(request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'         => 'max:100|min:2|unique:users,name',
            'avatar'         => 'mimes:png,jpeg'
        ]);
        
        if ($validator->fails()) 
        {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $input = $request->all();
        $user = User::findOrFail(Auth::user()->id);
        
        // If user typed a new name
        if($input['name'] != null)
        {
            $user->name = $input['name'];
        }


        if ($request->hasFile('file'))
        {
            // Delete current picture
            $userAvatarPath = $user->avatar;
            $imagePath = str_replace('/', '\\', $userAvatarPath);
            unlink(base_path().'\\public'.$imagePath); 

            // Save new picture
            $file = $request->file('file');
            $imageName = $user->email.'.'.$file->getClientOriginalExtension();
            $file->move(base_path().'/public/images/profilePictures/',$imageName);
            $user->avatar = '/images/profilePictures/'.$imageName;
        }

        $user->save();

        return Redirect::back()->with('success','Your profile has been successfully changed!');
    }
    
    public function earnOverheatingReward() 
    {
        if(Auth::check())
        {
            $thisUser = User::with('loops');
            $user = Auth::user();
            
            if($user->earnedReward1 == false)
            {
                $user->earnedReward1 = true;
                $currentRating = $user->rating;
                $newRating = $currentRating + 10;
                $user->rating = $newRating;
                $user->save();
            }
            
            return redirect()->route('profile')->with('user', $thisUser)->with('success','You have gained 10 rating with the overheating reward!');
        }
    }
    
}
