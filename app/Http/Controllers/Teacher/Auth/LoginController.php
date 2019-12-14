<?php

namespace App\Http\Controllers\Teacher\Auth;

use App\Http\Controllers\Controller;
use App\Model\Teacher\Teacher;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
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
    protected $redirectTo = '/teacher/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:teacher')->except('logout');
    }


     public function showLoginForm(){

        return view('backEnd.teachers.Auth.login');
     }


     public function login(Request $request){
        $this->validate($request,[
            'email' =>'required|email',
            'password' => 'required'
        ]);

       $teacher = Teacher::where('email',$request->email)->first();

       if($teacher){
           if($teacher->status == 1 && $teacher->email_verified_at !=NULL && $teacher->token == NULL){

            if (Auth::guard('teacher')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {

                 // The teacher is being remembered...
                Toastr::success('Teacher Login Successfully !!','success');
                return redirect()->route('teacher.dashboard.index');

            }

           else{
             Toastr::error('Cradential Errro!!','error');
        
            return redirect()->route('teacher.login');
         }
            
    }else{
        Toastr::error('Your are not varified teacher.!! Please varify your account','error');
                 return redirect()->route('teacher.login');
        }
       }else{

           Toastr::error('You are not teacher!','error');
        
            return redirect()->route('teacher.login');
       }

         

    }

    public function logout(Request $request){
        Auth::guard('teacher')->logout();
        Toastr::success('Teacher Logout Successfully !!','success');
        return redirect()->route('teacher.login');
    }


    protected function guard(){

        return Auth::guard('teacher');
    }
}
