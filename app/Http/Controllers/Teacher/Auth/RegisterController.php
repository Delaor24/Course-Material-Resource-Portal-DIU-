<?php

namespace App\Http\Controllers\Teacher\Auth;



use App\Http\Controllers\Controller;
use App\Model\Teacher\Teacher;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Brian2694\Toastr\Facades\Toastr;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest:teacher');
    }



       public function registrationVarify($token){
        $user = Teacher::where('token',$token)->first();

        $user->status = 1;
        $user->token = NULL;
        $user->email_verified_at = Carbon::now();

        $user->save();

        Toastr::success('Your account varified! Now you can login.','success');

        return redirect()->route('teacher.login');

    }
}
