<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Model\Teacher\Teacher;
use App\Notifications\TeacherReceiveLoginInformation;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class TeacherRegistrationController extends Controller
{
	public function __construct()
    {
     
        $this->middleware('auth:admin');
    }

    public function showRegistrationForm(){
    	return view('backEnd.Admin.Teachers.registration-form');
    }

     public function registrationProcess(Request $r){

     	$this->validate($r,[
     		'name' => 'required',
     		'initial' => 'required',
     		'email' => 'required|email|unique:teachers',
     		'phone_number' => 'required|min:11|max:13',
     		'password' => 'required|min:6|confirmed',
     	]);



     	$teacher = new Teacher();
     	$teacher->name = $r->name;
     	$teacher->initial = $r->initial;
     	$teacher->email = $r->email;
     	$teacher->phone_number = $r->phone_number;
     	$teacher->address  = $r->address;
     	$teacher->password = Hash::make($r->password);
     	$password = $r->password;
        $teacher->token = str_random(32);
     	$teacher->save();


        Toastr::success('Admin Teacher Registration successfully done. !!','success');
        
        $teacher->notify(new TeacherReceiveLoginInformation($teacher,$password));
        
        return redirect()->route('admin.teacher.index');


    	
    }

    public function index(){
    	$teachers = Teacher::all();
    	return view('backEnd.Admin.Teachers.index',compact('teachers'));
    }

     public function delete($id){
    	$teacher = Teacher::findOrFail($id);
    	$teacher->delete();
    	Toastr::success('Admin Teacher Removed !!','success');
    	return redirect()->back();
    	
    }
}
