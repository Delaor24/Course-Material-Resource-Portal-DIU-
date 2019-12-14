<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Model\Admin\Faculty;
class FacultyController extends Controller
{
    public function __construct(){
        return $this->middleware('auth:admin');
    }
    
     public function index(){
     	$faculties = Faculty::all();
    	return view('backEnd.admin.Faculty.index',compact('faculties'));
    }

     public function create(){
    	return view('backEnd.admin.Faculty.create');
    }

     public function store(Request $request){
    	$this->validate($request,[
    		'facultyName'=>'required',

    	]);

    	$faculty = new Faculty();
    	$faculty->facultyName = $request->facultyName;
    	$faculty->save();
    	Toastr::success('Admin Faculty name Added !!','success');
    	return redirect()->route('admin.faculty.index');
    }

    public function edit($id){
    	$faculty = Faculty::find($id);
    	return view('backEnd.admin.Faculty.edit',compact('faculty'));
    }

    public function update(Request $request,$id){
    	$this->validate($request,[
    		'facultyName'=>'required',

    	]);
         
        $faculty = Faculty::find($id);
    	$faculty->facultyName = $request->facultyName;
    	$faculty->save();
    	Toastr::info('Admin Faculty name updated !!','info');
    	return redirect()->route('admin.faculty.index');
    }

     public function delete($id){

     	
    	$faculty = Faculty::find($id);
    	$faculty->delete();
    	Toastr::error('Admin Faculty name deleted !!','error');
        return redirect()->route('admin.faculty.index');
    }
    
}
