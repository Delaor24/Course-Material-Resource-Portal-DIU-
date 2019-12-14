<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\Admin\Content;
use App\Model\Admin\TeacherAssign;
use Illuminate\Http\Request;

class UserViewContentController extends Controller
{
    public function __construct(){
    	return $this->middleware('auth:web');
    }

    public function viewContent(){
        return view('backEnd.users.viewContents.create');
    }

    public function getContent(Request $request){
    	$this->validate($request,[
    		'faculty_id' => 'required',
    		'department_id' => 'required',
    		'program_id' => 'required',
    		'semester_id' => 'required',
    		'course_id' => 'required',
    	]);

    	$contents = Content::where('status',1)
        ->where('faculty_id',$request->faculty_id)
    	->where('department_id',$request->department_id)
    	->where('program_id',$request->program_id)
    	->where('semester_id',$request->semester_id)
    	->where('course_id',$request->course_id)->get();

      

    	$teacherAssigns = TeacherAssign::where('faculty_id',$request->faculty_id)
    	->where('department_id',$request->department_id)
    	->where('program_id',$request->program_id)
    	->where('semester_id',$request->semester_id)
    	->where('course_id',$request->course_id)->get();

    	return view('backEnd.users.viewContents.index',compact('contents','teacherAssigns'));

    	
    }
}
