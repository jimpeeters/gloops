<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Auth;
use Socialite;
use Redirect;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    //facebook login

    protected $redirectPath = '/';
 
    /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }
 
    /**
     * Obtain the user information from Facebook.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();
        } catch (Exception $e) {
            return redirect('auth/facebook');
        }
 
        $authUser = $this->findOrCreateUser($user);
 
        Auth::login($authUser, true);
 
        return redirect()->route('/');
    }
 
    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $facebookUser
     * @return User
     */
    private function findOrCreateUser($facebookUser)
    {
        $authUser = User::where('facebook_id', $facebookUser->id)->first();
 
        if ($authUser){
            return $authUser;
        }
 
        return User::create([
            'name' => $facebookUser->name,
            'email' => $facebookUser->email,
            'facebook_id' => $facebookUser->id,
            'avatar' => $facebookUser->avatar
        ]);
    }

    //logout --------------------
    public function getLogout()
    {
        Auth::logout();
        return redirect('/')->with('success',"Successvol uitgelogd!");
    }

    //register ------------------------
    public function register(Request $request)
    {
    /*        if($request->has('facebook'))
    {
         $validator = Validator::make($request->all(), [
            'fName'         => 'required|max:100|min:2',
            'lName'         => 'required|max:100|min:2',
            'username'      => 'required|min:4|max:20',
            'email'         => 'email|required|unique:Users,email',
            'city'          => 'required',
            'validLocation' => 'accepted'
        ]);
    }*/

       $validator = Validator::make($request->all(), [
            'name'         => 'required|max:100|min:2',
            'password'      => 'required|confirmed|min:6',
            'email'         => 'email|required|unique:users,email',
            'avatar'         => 'mimes:png,jpeg'
        ]);
        

        if ($validator->fails()) 
        {
            /* if($request->has('facebook'))
            {

                $user = new User();
                $user->isFacebook = true;

                return redirect()->back()
                        ->with('user',$user)
                        ->withErrors($validator)
                        ->withInput();
            }*/
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $input = $request->all();

        $user = new User();
        $user->name = $input['name'];
        $user->email    = $input['email'];

        /* if($request->has('facebook'))
        {
            $user->facebookAccount  = true;
            $user->profilePicture = $input['profilePicture'];

            $user->save();

            Auth::login($user);
            return redirect('/')->with('success','Account successvol aangemaakt!');
        }*/

        $user->facebookAccount  = false;
        $user->password         = \Hash::make($input['password']);
        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $imageName = $user->email.'.'.$file->getClientOriginalExtension();
            $file->move(base_path().'/public/images/profilePictures/',$imageName);
            $user->avatar = '/images/profilePictures/'.$imageName;
        }

        $user->save();
        return redirect('/')->with('success','Account successvol aangemaakt!');
    }

    public function login(request $request)
    {   
        $input = $request->all();

        if (Auth::attempt(['email' => $input['email'], 'password' => $input['password']]))
        {
            return Redirect::route('home');
        }
        else
        {
            return Redirect::route('home')->with('loginFail', ['fail']);
        }
    }
}
