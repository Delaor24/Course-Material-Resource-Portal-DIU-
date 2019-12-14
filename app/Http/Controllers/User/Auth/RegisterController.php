<?php

namespace App\Http\Controllers\User\Auth;


use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Notifications\UserAccountVarification;
use Carbon\Carbon;
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
    protected $redirectTo = '/user/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }



      /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('backEnd.users.Auth.registrar');
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function registrationProcess(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'username' => 'required|min:4|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'phone_number' =>'required|max:12|min:11',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = new User();

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
        $user->token = str_random(32);
        
        $user->save();
      
        $user->notify(new UserAccountVarification($user));
        
        Toastr::success('Your Registration successfully done! please varify your account','success');

        return redirect()->route('user.login');
    }

    public function registrationVarify($token){
        $user = User::where('token',$token)->first();

        $user->status = 1;
        $user->token = NULL;
        $user->email_verified_at = Carbon::now();

        $user->save();

        Toastr::success('Your account varified! Now you can login.','success');

        return redirect()->route('user.login');

    }
}
