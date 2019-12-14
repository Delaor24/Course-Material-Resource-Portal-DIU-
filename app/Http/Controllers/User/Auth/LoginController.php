<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Brian2694\Toastr\Facades\Toastr;
use App\Model\Admin\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:web')->except('logout');
    }


     public function showLoginForm(){

        return view('backEnd.users.Auth.login');
     }


     public function login(Request $request){
        $this->validate($request,[
            'email' =>'required|email',
            'password' => 'required'
        ]);

       $user = User::where('email',$request->email)->first();

       if($user){
           if($user->status == 1 && $user->email_verified_at !=NULL && $user->token == NULL){

            if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {

                 // The user is being remembered...
                Toastr::success('User Login Successfully !!','success');
                return redirect()->route('frontEnd.home');

            }

           else{
             Toastr::error('Cradential Errro!!','error');
        
            return redirect()->route('user.login');
         }
            
    }else{
        Toastr::error('Your are not varified user.!! Please varify your account','error');
                 return redirect()->route('user.login');
        }

       }else{
        Toastr::error('You are not user. please registrar first','error'); 
         return redirect()->route('user.login');
       }



        
    }

    public function logout(Request $request){
        Auth::guard('web')->logout();
        Toastr::success('User Logout Successfully !!','success');
        return redirect()->route('user.login');
    }


    protected function guard(){

        return Auth::guard('web');
    }
}
