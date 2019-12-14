<?php

namespace App\Http\Controllers\User\Profile;

use App\Http\Controllers\Controller;
use App\Model\Admin\Admin;
use App\User;
use Auth;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
class ProfileUpdateController extends Controller
{
	public function __construct(){
        return $this->middleware('auth:web');
    }

	public function index(){
    	return view('backEnd.users.settings.profile');
    }

    public function ProfileUpdate(){
    	return view('backEnd.users.settings.editProfile');
    }

    public function profileStore(Request $request){
        $this->validate($request,[
            'file' => 'image|max:10240',
        ]);
    	$profile = Auth::user();


    	$image = $request->file('file');
   
        if(isset($image))
        {
//            make unipue name for image
            $currentDate = Carbon::now()->toDateString();
            $contentFile  = $currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if(!Storage::disk('public')->exists('backEnd/users/profile/'))
            {
                Storage::disk('public')->makeDirectory('backEnd/users/profile/');
            }

             //    delete old  image
            if(Storage::disk('public')->exists('backEnd/users/profile/'.$profile->avatar))
            {
                Storage::disk('public')->delete('backEnd/users/profile/'.$profile->avatar);
            }


            $contentImage = Image::make($image)->resize(1600,1066)->stream();
            Storage::disk('public')->put('backEnd/users/profile/'.$contentFile,$contentImage);
        } 
        else{
        	$contentFile = $profile->avatar;
        }

    	$profile->name = $request->name;
    	$profile->email = $request->email;
        
        $profile->avatar = $contentFile;

    	
    	$profile->save();
        Toastr::success('User Update profile','success');
    	return redirect()->route('user.profile');

    }

    public function changePassword(){
    	return view('backEnd.users.settings.passwordChange');
    }

    public function passwordStore(Request $request){
    	
    	 	$this->validate($request,[
    		'old_password'=>'required',
    		'password'=>'required|confirmed'

    	]);

    	$hashPassword = Auth::user()->password;

    	if(hash::check($request->old_password,$hashPassword)){
    		if(!hash::check($request->password,$hashPassword)){
    			$admin = User::find(Auth::id());
    			$admin->password = hash::make($request->password);
    			$admin->save();
    			Toastr::success('User Change password successfully done :','success');
    			Auth::guard('web')->logout();
    			return redirect()->back();
    		}
    		else{
    			Toastr::error('New password can not same old password :','error');
    			return redirect()->back();
    		}
    	}
    	else{
    		Toastr::error('Current password not match :','error');
    			return redirect()->back();
    	}
    }


    protected function guard(){

        return Auth::guard('web');
    }
}
