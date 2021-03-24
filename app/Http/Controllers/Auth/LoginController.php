<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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
    //protected $redirectTo = RouteServiceProvider::HOME;

    protected $redirectTo;

    protected function redirectTo(){
        if (Auth::user()->usertype == 'admin') {

            $this->redirectTo ='dashboard/';

            return $this->redirectTo;

        } elseif (Auth::user()->usertype == 'Chef_agence_A') {

            $this->redirectTo ='agence_A/';

            return $this->redirectTo;

        } elseif (Auth::user()->usertype == 'Magasin_agence_A'){

            $this->redirectTo ='Magasin_agence_A/';

            return $this->redirectTo;

        } elseif (Auth::user()->usertype == 'Chef_agence_B'){

            $this->redirectTo ='Chef_agence_B/';

            return $this->redirectTo;

        } elseif (Auth::user()->usertype == 'client'){

            $this->redirectTo ='client/';

            return $this->redirectTo;

        }
        else {

            return 'home';
            # code...

        }
        //
    }

    /*protected $redirectTo;

    protected function redirectTo()
        {
        if(\Auth::user()->hasRole('copy')){
            $this->redirectTo = '/copy/dashboardCopy';
            return $this->redirectTo;
        }
    }*
     * Create a new controller instance
     * .
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
