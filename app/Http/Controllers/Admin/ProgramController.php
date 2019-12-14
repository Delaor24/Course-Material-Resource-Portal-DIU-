<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Model\Admin\Program;
class ProgramController extends Controller
{
    public function __construct(){
        return $this->middleware('auth:admin');
    }
    
     public function index(){
     	$programs = Program::all();
    	return view('backEnd.admin.Program.index',compact('programs'));
    }

     public function create(){
    	return view('backEnd.admin.program.create');
    }

     public function store(Request $request){
    	$this->validate($request,[
           
    		'programeName'=>'required',

    	]);

    	$program = new Program();
       
    	$program->programeName = $request->programeName;
    	$program->save();
    	Toastr::success('Admin program name Added !!','success');
    	return redirect()->route('admin.program.index');
    }

    public function edit($id){
    	$program = Program::find($id);
    	return view('backEnd.admin.program.edit',compact('program'));
    }

    public function update(Request $request,$id){
    	$this->validate($request,[
           
    		'programeName'=>'required',
            

    	]);
         
        $program = program::find($id);
       
    	$program->programeName = $request->programeName;
    	$program->save();
    	Toastr::info('Admin program name updated !!','info');
    	return redirect()->route('admin.program.index');
    }

     public function delete($id){

     	
    	$program = Program::find($id);
    	$program->delete();
    	Toastr::error('Admin program name deleted !!','error');
        return redirect()->route('admin.program.index');
    }
    
}
