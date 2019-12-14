<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Model\Admin\Semester;
class SemesterController extends Controller
{
    public function __construct(){
        return $this->middleware('auth:admin');
    }
    
     public function index(){
     	$semesters = Semester::all();
    	return view('backEnd.admin.Semester.index',compact('semesters'));
    }

     public function create(){
    	return view('backEnd.admin.Semester.create');
    }

     public function store(Request $request){
    	$this->validate($request,[
            'program_id'=>'required',
    		'semesterName'=>'required',

    	]);

    	$semester = new Semester();
        $semester->program_id = $request->program_id;
    	$semester->semesterName = $request->semesterName;
    	$semester->save();
    	Toastr::success('Admin semester name Added !!','success');
    	return redirect()->route('admin.semester.index');
    }

    public function edit($id){
    	$semester = Semester::find($id);
    	return view('backEnd.admin.semester.edit',compact('semester'));
    }

    public function update(Request $request,$id){
    	$this->validate($request,[
            'program_id'=>'required',
    		'semesterName'=>'required',
            

    	]);
         
        $semester = Semester::find($id);
        $semester->program_id = $request->program_id;
    	$semester->semesterName = $request->semesterName;
    	$semester->save();
    	Toastr::info('Admin semester name updated !!','info');
    	return redirect()->route('admin.semester.index');
    }

     public function delete($id){

     	
    	$semester = Semester::find($id);
    	$semester->delete();
    	Toastr::error('Admin semester name deleted !!','error');
        return redirect()->route('admin.semester.index');
    }
    
}
