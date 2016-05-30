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
use View;
use Image;

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
    //protected $redirectTo = '/';

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
 
        return redirect()->route('home')->with('successfullFacebookLogin', Auth::user()->name);
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
            'name' => $facebookUser->getName(),
            'email' => $facebookUser->getEmail(),
            'facebook_id' => $facebookUser->getId(),
            'avatar' => $facebookUser->getAvatar(),
            'facebookAccount' => 1

        ]);
    }

    //logout --------------------
    public function getLogout()
    {
        $user = Auth::user()->name;
        Auth::logout();
        return Redirect::back()->with('successfullLogout', $user);
    }

    //get register page ------------
    public function getRegister()
    {
        return View::make('auth.register');
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
            'name'         => 'required|max:50|min:2|unique:users,name',
            'password'      => 'required|confirmed|min:6|max:100',
            'email'         => 'required|email|unique:users,email',
            'image'         => 'mimes:png,jpeg|max:500'
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

            // To toggle register view in station and profile
            $registerMessages = '';

            return redirect()->back()
                        ->with('registerMessages', $registerMessages)
                        ->withErrors($validator)
                        ->withInput($request->all());
        }

        $input = $request->all();

        $user = new User();
        // Capitalize first letter and lowercase next
        $name = ucwords(strtolower($input['name']));
        $userName = $name;
        $user->name = $name;
        $user->email    = $input['email'];
        $user->rating = 0;
        $user->rank = 1;

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
            $img = Image::make($file);
            $img->fit(200);
            $img->save(base_path().'\public\images\profilePictures\\'.$imageName);
            $user->avatar = '/images/profilePictures/'.$imageName;
        }
        else
        {
            $user->avatar = 'images/profilePictures/default.png';
        }

        $user->save();
        Auth::login($user);
        
        return redirect()->back()->with('successfullRegister', $userName);
    }

    // Login from normal page
    public function login(request $request)
    {   
        $validator = Validator::make($request->all(), [
            'email'         => 'required|email',
            'password'      => 'required'
        ]);

        $input = $request->all();

        if ($validator->fails()) 
        {
            // If validator fails
            return Redirect::back()->withErrors($validator)->withInput();                                                             
        }
        else
        {            
            if (Auth::attempt(['email' => $input['email'], 'password' => $input['password']]))
            {
                // If login succeeds
                return Redirect::back()->with('successfullLogin', Auth::user()->name);
            }
            else
            {
                // If login fails
                return Redirect::back()->withErrors(array('Oops! The email or password you entered is incorrect.')); 
            }
        }
    }

    // Login from modal
    public function loginModal(request $request)
    {   
        $validator = Validator::make($request->all(), [
            'email'         => 'required|email',
            'password'      => 'required'
        ]);

        $input = $request->all();
        $loginModal = '';

        if ($validator->fails()) 
        {
            // If validator fails
            return Redirect::back()->withErrors($validator)->withInput()->with('loginModal', $loginModal);                                                             
        }
        else
        {            
            if (Auth::attempt(['email' => $input['email'], 'password' => $input['password']]))
            {
                // If login succeeds
                return Redirect::back()->with('successfullLogin', Auth::user()->name);
            }
            else
            {
                // If login fails
                return Redirect::back()->withErrors(array('Oops! The email or password you entered is incorrect.'))->with('loginModal', $loginModal); 
            }
        }
    }
}
