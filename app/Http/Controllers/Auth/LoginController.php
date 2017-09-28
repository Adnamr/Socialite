<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Socialite;

use App\ProvidersSocialite;

use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider($provider)
        {
            return Socialite::driver($provider)->redirect();
        }

        /**
         * Obtain the user information from GitHub.
         *
         * @return Response
         */
        public function handleProviderCallback($provider)
        {
            $user = Socialite::driver($provider)->user();
            $selectProvider=ProvidersSocialite::where('provider_id',$user->getId())->first();
            if (!$selectProvider) 
            {
               $getuserReal=User::where('email',$user->getEmail())->first();
            
            if (!$getuserReal) 
                {
                $getuserReal=new User();
                $getuserReal->name=$user->getName();
                $getuserReal->email=$user->getEmail();
                $getuserReal->save();
                }

            $newprovider =new ProvidersSocialite();
            $newprovider->provider_id=$user->getId();
            $newprovider->user_id=$getuserReal->id;
            $newprovider->provider=$provider;
            $newprovider->save();
            }else
            {
                $getuserReal=User::find($selectProvider->user_id);
            }

            auth()->login($getuserReal);
            return redirect('/');
        }
}
