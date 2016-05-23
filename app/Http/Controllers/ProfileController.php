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
        $input = $request->all();

        $validator = Validator::make($request->all(), [
            'name'         => 'required|max:100|min:2|unique:users,name,'.$input['id'],
            'avatar'         => 'mimes:png,jpeg',
            'oldpassword'      => 'min:6',
            'newpassword'      => 'min:6',
            'email'         => 'required|email|unique:users,email,'.$input['id']
        ]);
        
        if ($validator->fails()) 
        {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput()
                        ->with('updateMessage','update message');
        }

        $user = User::findOrFail(Auth::user()->id);
        
        $user->name = $input['name'];
        $user->email = $input['email'];

        // If users has filled in old and new password
        if ($input['newpassword'] != null && $input['oldpassword'] != null)
        {
            // Check if old password is correct
            if( \Hash::check($input['oldpassword'], $user->password) )
            {
                $user->password = \Hash::make($input['password']);
            }
            else
            {
                return redirect()->back()->with('error', 'Your old password is incorrect')->with('updateMessage','update message');
            }
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

    // Administrator options
    public function admin()
    {
        if(Auth::user()->id == 1)
        {
            $users = User::where('id', '!=', '1')->with('loops')->get();
            return View::make('admin-options')->with('users', $users);
        }
        else
        {
            return View::make('admin-options');
        }
    }

    public function deleteUser($id)
    {
        if(Auth::user()->id == 1)
        {
            $user = User::findOrFail($id);
            $userName = $user->name;
            $user->delete();

            return Redirect::back()->with('success','You have sucessfully deleted ' . $userName . '.');
        }
        else
        {
            return View::make('admin-options');
        }

    }
}
