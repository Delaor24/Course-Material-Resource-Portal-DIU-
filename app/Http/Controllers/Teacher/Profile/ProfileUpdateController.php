<?php

namespace App\Http\Controllers\Teacher\Profile;

use App\Http\Controllers\Controller;

use App\Model\Teacher\Teacher;
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
        return $this->middleware('auth:teacher');
    }

	public function index(){
    	return view('backEnd.teachers.settings.profile');
    }

    public function ProfileUpdate(){
    	return view('backEnd.teachers.settings.editProfile');
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
            if(!Storage::disk('public')->exists('backEnd/teachers/profile/'))
            {
                Storage::disk('public')->makeDirectory('backEnd/teachers/profile/');
            }

             //    delete old  image
            if(Storage::disk('public')->exists('backEnd/teachers/profile/'.$profile->avatar))
            {
                Storage::disk('public')->delete('backEnd/teachers/profile/'.$profile->avatar);
            }


            $contentImage = Image::make($image)->resize(1600,1066)->stream();
            Storage::disk('public')->put('backEnd/teachers/profile/'.$contentFile,$contentImage);
        } 
        else{
        	$contentFile = $profile->avatar;
        }

    	$profile->name = $request->name;
    	$profile->email = $request->email;
        $profile->phone_number = $request->phone_number;
        $profile->address = $request->address;
        
        $profile->avatar = $contentFile;

    	
    	$profile->save();
        Toastr::success('Teacher Update profile','success');
    	return redirect()->route('teacher.profile');

    }

    public function changePassword(){
    	return view('backEnd.teachers.settings.passwordChange');
    }

    public function passwordStore(Request $request){
    	
    	 	$this->validate($request,[
    		'old_password'=>'required',
    		'password'=>'required|confirmed|min:6'

    	]);

    	$hashPassword = Auth::user()->password;

    	if(hash::check($request->old_password,$hashPassword)){
    		if(!hash::check($request->password,$hashPassword)){
    			$teacher = Teacher::find(Auth::id());
    			$teacher->password = hash::make($request->password);
    			$teacher->save();
    			Toastr::success('Teacher Change password successfully done :','success');
    			Auth::guard('teacher')->logout();
    			return redirect()->route('teacher.login');
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

        return Auth::guard('teacher');
    }
}
