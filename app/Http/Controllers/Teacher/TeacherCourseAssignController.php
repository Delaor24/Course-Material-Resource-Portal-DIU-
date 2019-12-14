<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Model\Admin\TeacherAssign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherCourseAssignController extends Controller
{
	public function __construct(){
		return $this->middleware('auth:teacher');
	}

    public function index(){
    	$teacherAssigns = TeacherAssign::where('teacher_id',Auth::id())->get();

    	return view('backEnd.teachers.AssignCourses.index',compact('teacherAssigns'));

    }
}
