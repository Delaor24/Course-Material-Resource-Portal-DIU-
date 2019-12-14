<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Model\Admin\Department;
class DepartmentController extends Controller
{
    public function __construct(){
        return $this->middleware('auth:admin');
    }
    
     public function index(){
     	$departments = Department::all();
    	return view('backEnd.admin.Department.index',compact('departments'));
    }

     public function create(){
    	return view('backEnd.admin.Department.create');
    }

     public function store(Request $request){
    	$this->validate($request,[
            'faculty_id'=>'required',
    		'departmentName'=>'required',

    	]);

    	$department = new Department();
        $department->faculty_id = $request->faculty_id;
    	$department->departmentName = $request->departmentName;
    	$department->save();
    	Toastr::success('Admin department name Added !!','success');
    	return redirect()->route('admin.department.index');
    }

    public function edit($id){
    	$department = Department::find($id);
    	return view('backEnd.admin.department.edit',compact('department'));
    }

    public function update(Request $request,$id){
    	$this->validate($request,[
            'faculty_id'=>'required',
    		'departmentName'=>'required',
            

    	]);
         
        $department = Department::find($id);
        $department->faculty_id = $request->faculty_id;
    	$department->departmentName = $request->departmentName;
    	$department->save();
    	Toastr::info('Admin department name updated !!','info');
    	return redirect()->route('admin.department.index');
    }

     public function delete($id){

     	
    	$department = Department::find($id);
    	$department->delete();
    	Toastr::error('Admin department name deleted !!','error');
        return redirect()->route('admin.department.index');
    }
    
}
