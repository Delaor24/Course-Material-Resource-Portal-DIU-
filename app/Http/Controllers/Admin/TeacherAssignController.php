<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\TeacherAssign;
use App\Model\Teacher\Teacher;
use App\Notifications\TeacherAssignNotification;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
class TeacherAssignController extends Controller
{
    public function __construct(){
        return $this->middleware('auth:admin');
        
    }
    
     public function index(){
     	$teacherAssigns = TeacherAssign::all();
    	return view('backEnd.admin.teacherAssign.index',compact('teacherAssigns'));
    }

     public function create(){
    	return view('backEnd.admin.TeacherAssign.create');
    }

     public function store(Request $request){
    	$this->validate($request,[
            'teacher_id' => 'required',
            'department_id'=>'required',
            'program_id'=>'required',
            'semester_id'=>'required',
            'course_id'=>'required',
            'faculty_id'=>'required',

    	]);

    	$teacherAssign = new TeacherAssign();
        $teacherAssign->teacher_id = $request->teacher_id;
        $teacherAssign->department_id = $request->department_id;
        $teacherAssign->program_id = $request->program_id;
        $teacherAssign->semester_id = $request->semester_id;
        $teacherAssign->course_id = $request->course_id;
        $teacherAssign->faculty_id = $request->faculty_id;
    	$teacherAssign->save();

        

    	Toastr::success('Admin Assign course Added to Teacher!!','success');

        $teacher = Teacher::findOrFail($teacherAssign->teacher_id);

        if($teacher){
            $teacher->notify(new TeacherAssignNotification($teacherAssign));
        }

    	return redirect()->route('admin.teacherAssign.index');
    }

    public function edit($id){
    	$teacherAssign = TeacherAssign::find($id);
    	return view('backEnd.admin.teacherAssign.edit',compact('teacherAssign'));
    }

    public function update(Request $request,$id){
    	$this->validate($request,[
            'teacher_id' => 'required',
            'department_id'=>'required',
            'program_id'=>'required',
            'semester_id'=>'required',
            'course_id'=>'required',
            'faculty_id'=>'required',
            

    	]);
         
        $teacherAssign = TeacherAssign::findOrFail($id);
        $teacherAssign->teacher_id = $request->teacher_id;
        $teacherAssign->department_id = $request->department_id;
        $teacherAssign->program_id = $request->program_id;
        $teacherAssign->semester_id = $request->semester_id;
        $teacherAssign->course_id = $request->course_id;
        $teacherAssign->faculty_id = $request->faculty_id;
    	$teacherAssign->save();

        $teacher = Teacher::findOrFail($teacherAssign->teacher_id);

        if($teacher){
           
            $teacher->notify(new TeacherAssignNotification($teacherAssign));
        }

    	Toastr::success('Admin Assign course updated to Teacher!!','success');

    	return redirect()->route('admin.teacherAssign.index');
    }

     public function delete($id){

     	
    	$course = TeacherAssign::findOrFail($id);
    	$course->delete();
    	Toastr::error('Admin course Assign deleted !!','error');
        return redirect()->route('admin.teacherAssign.index');
    }
}
