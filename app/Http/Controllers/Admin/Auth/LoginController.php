<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Brian2694\Toastr\Facades\Toastr;
use App\Model\Admin\Admin;
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
    protected $redirectTo = '/admin/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
     
        $this->middleware('guest:admin')->except('logout');
    }


     public function showLoginForm(){

        return view('backEnd.admin.Auth.login');
     }


     public function login(Request $request){
        $this->validate($request,[
            'email' =>'required|email',
            'password' => 'required | min:6'
        ]);


        

     $admin = Admin::find(1);

     $adminMail = $admin->email;

     if($adminMail != $request->email){
        Toastr::error('This email not match!!','error');
        
        return redirect()->route('admin.login');
     }

     

     


      if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {


                // The user is being remembered...
                Toastr::success('Admin Login Successfully !!','success');
                return redirect()->route('admin.dashboard.index');

       }
       else{
        Toastr::error('Cradential Errro!!','error');
        
        return redirect()->route('admin.login');
       }





    }

    public function logout(Request $request){
        Auth::guard('admin')->logout();
        Toastr::success('Admin Logout Successfully !!','success');
        return redirect()->route('admin.login');
    }


    protected function guard(){

        return Auth::guard('admin');
    }
}
