<?php

namespace App\Http\Controllers\Admin\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Brian2694\Toastr\Facades\Toastr;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Model\Admin\Admin;
class ProfileUpdateController extends Controller
{
	public function __construct(){
        return $this->middleware('auth:admin');
    }

	public function index(){
    	return view('backEnd.admin.settings.profile');
    }

    public function ProfileUpdate(){
    	return view('backEnd.admin.settings.editProfile');
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
            if(!Storage::disk('public')->exists('backEnd/admin/profile/'))
            {
                Storage::disk('public')->makeDirectory('backEnd/admin/profile/');
            }

             //    delete old  image
            if(Storage::disk('public')->exists('backEnd/admin/profile/'.$profile->avatar))
            {
                Storage::disk('public')->delete('backEnd/admin/profile/'.$profile->avatar);
            }


            $contentImage = Image::make($image)->resize(1600,1066)->stream();
            Storage::disk('public')->put('backEnd/admin/profile/'.$contentFile,$contentImage);
        } 
        else{
        	$contentFile = $profile->avatar;
        }

    	$profile->name = $request->name;
    	$profile->email = $request->email;
        
        $profile->avatar = $contentFile;

    	
    	$profile->save();
        Toastr::success('Admin Update profile','success');
    	return redirect()->route('admin.profile');

    }

    public function changePassword(){
    	return view('backEnd.admin.settings.passwordChange');
    }

    public function passwordStore(Request $request){
    	
    	 	$this->validate($request,[
    		'old_password'=>'required',
    		'password'=>'required|confirmed'

    	]);

    	$hashPassword = Auth::user()->password;

    	if(hash::check($request->old_password,$hashPassword)){
    		if(!hash::check($request->password,$hashPassword)){
    			$admin = Admin::find(Auth::id());
    			$admin->password = hash::make($request->password);
    			$admin->save();
    			Toastr::success('Admin Change password successfully done :','success');
    			Auth::guard('admin')->logout();
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

        return Auth::guard('admin');
    }
}
