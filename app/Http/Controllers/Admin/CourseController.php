<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Model\Admin\Course;
class CourseController extends Controller
{
    public function __construct(){
        return $this->middleware('auth:admin');
    }
    
     public function index(){
     	$courses = Course::all();
    	return view('backEnd.admin.Course.index',compact('courses'));
    }

     public function create(){
    	return view('backEnd.admin.Course.create');
    }

     public function store(Request $request){
    	$this->validate($request,[
            'semester_id'=>'required',
            'courseCode' =>'required',
    		'courseName'=>'required',

    	]);

    	$course = new Course();
        $course->semester_id = $request->semester_id;
        $course->courseCode = $request->courseCode;
    	$course->courseName = $request->courseName;
    	$course->save();
    	Toastr::success('Admin course name Added !!','success');
    	return redirect()->route('admin.course.index');
    }

    public function edit($id){
    	$course = Course::find($id);
    	return view('backEnd.admin.course.edit',compact('course'));
    }

    public function update(Request $request,$id){
    	$this->validate($request,[
            'semester_id'=>'required',
            'courseCode'=>'required',
    		'courseName'=>'required',
            

    	]);
         
        $course = Course::find($id);
        $course->semester_id = $request->semester_id;
        $course->courseCode = $request->courseCode;

    	$course->courseName = $request->courseName;
    	$course->save();
    	Toastr::info('Admin course name updated !!','info');
    	return redirect()->route('admin.course.index');
    }

     public function delete($id){

     	
    	$course = Course::find($id);
    	$course->delete();
    	Toastr::error('Admin course name deleted !!','error');
        return redirect()->route('admin.course.index');
    }
    
}
