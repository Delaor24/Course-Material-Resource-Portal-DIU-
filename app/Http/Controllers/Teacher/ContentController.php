<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Model\Admin\Admin;
use App\Model\Admin\Content;
use App\Model\Admin\Course;
use App\Model\Admin\Department;
use App\Model\Admin\Faculty;
use App\Model\Admin\File;
use App\Model\Admin\Program;
use App\Model\Admin\Semester;
use App\Model\Admin\TeacherAssign;
use App\Notifications\TeacherContentApproveNotification;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
class ContentController extends Controller
{
    public function __construct(){
        return $this->middleware('auth:teacher');
    }
    
     public function index(){



     	$contents = Content::where('user_id',Auth::id())->get();
    	return view('backEnd.teachers.Content.index',compact('contents'));
    }

     public function create(){

        $facultyId = [];
        $departmentId = [];
        $programeId = [];
        $semesterId = [];
        $courseId = [];

        $teacherAssigns = TeacherAssign::where('teacher_id',Auth::id())->get();

        foreach ($teacherAssigns as $assign) {
           $facultyId[] = $assign->faculty_id;
           $departmentId[] = $assign->department_id;
           $programeId[] = $assign->program_id;
           $semesterId[] = $assign->semester_id;
           $courseId[] = $assign->course_id;

        }

        



        $faculties = Faculty::whereIn('id',$facultyId)->get();
        $departments = Department::whereIn('id',$departmentId)->get();
        $programes = Program::whereIn('id',$programeId)->get();
        $semesters = Semester::whereIn('id',$semesterId)->get();
        $courses = Course::whereIn('id',$courseId)->get();

       
    	return view('backEnd.teachers.Content.create',compact('faculties','departments','programes','semesters','courses'));
    }

     public function store(Request $request){

    	$this->validate($request,[
            'faculty_id'=>'required',
            'department_id'=>'required',
            'program_id'=>'required',
            'semester_id'=>'required',
            'course_id'=>'required',
    	    'title'=>'required',
            'description'=>'required',

            

    	]);

      

        $checkImage = 0;

        $image = $request->file('file');

        $slug = str_slug($request->title);
        if(isset($image))
        {
            $imageStore = [];

            foreach ($request->file as $file) {

                $currentDate = Carbon::now()->toDateString();

               $fileName = $file->getClientOriginalName();
               $directory = 'storage/backEnd/images/contents/';
                $imageUrl = $directory.$fileName;

                $imageStore[] = $fileName;
        
                if(!Storage::disk('public')->exists('backEnd/images/contents'))
                {
                    Storage::disk('public')->makeDirectory('backEnd/images/contents');
                }

               if($file->getClientOriginalExtension() == 'pdf' || $file->getClientOriginalExtension() == 'doc' || $file->getClientOriginalExtension() == 'docx' || $file->getClientOriginalExtension() == 'pptx' || $file->getClientOriginalExtension() == 'ppt'){
                  // Storage::disk('public')->put('backEnd/images/contents/',$file);
                $file->move($directory,$imageUrl);
               }else{
                $contentImage = Image::make($file)->resize(1600,1600)->stream();
                Storage::disk('public')->put('backEnd/images/contents/'.$fileName,$contentImage);
               }


                
        }

        $checkImage = 1;

   }

         
  
      


        $content = new Content();
        
        $content->user_id = Auth::user()->id;
        $content->status = 0;
        $content->faculty_id = $request->faculty_id;
        $content->department_id = $request->department_id;
        $content->program_id = $request->program_id;
        $content->semester_id = $request->semester_id;
        $content->course_id = $request->course_id;

        $content->title = $request->title;
        $content->description = $request->description;

        if($checkImage == 1){
           $myImageString='';
           
           foreach ($imageStore as $image){
             $myImageString .=  $image.',';
           }

         $content->file = $myImageString;
        }
        
        
        $content->save();

        

   
        $admin = Admin::findOrFail(1);

        if($admin){
        	 $admin->notify(new TeacherContentApproveNotification($content));
        }

       

    	Toastr::success('Teacher course content Added !!','success');
    	return redirect()->route('teacher.content.index');
    }

    public function edit($id){
    	$content = Content::findOrFail($id);


        $facultyId = [];
        $departmentId = [];
        $programeId = [];
        $semesterId = [];
        $courseId = [];

        $teacherAssigns = TeacherAssign::where('teacher_id',Auth::id())->get();

        foreach ($teacherAssigns as $assign) {
           $facultyId[] = $assign->faculty_id;
           $departmentId[] = $assign->department_id;
           $programeId[] = $assign->program_id;
           $semesterId[] = $assign->semester_id;
           $courseId[] = $assign->course_id;

        }

        



        $faculties = Faculty::whereIn('id',$facultyId)->get();
        $departments = Department::whereIn('id',$departmentId)->get();
        $programes = Program::whereIn('id',$programeId)->get();
        $semesters = Semester::whereIn('id',$semesterId)->get();
        $courses = Course::whereIn('id',$courseId)->get();


    	return view('backEnd.teachers.Content.edit',compact('content','faculties','departments','programes','semesters','courses'));
    }

    public function update(Request $request,$id){
    	$this->validate($request,[
             'faculty_id'=>'required',
            'department_id'=>'required',
            'program_id'=>'required',
            'semester_id'=>'required',
            'course_id'=>'required',
            'title'=>'required',
            'description'=>'required',
            
          
    	]);

      $checkImage = 0;

        $content = Content::find($id);

         $image = $request->file('file');

        $slug = str_slug($request->title);
        if(isset($image))
        {
            $imageStore = [];

            foreach ($request->file as $file) {

                $currentDate = Carbon::now()->toDateString();

                $fileName = $file->getClientOriginalName();

                $directory = 'storage/backEnd/images/contents/';
                $imageUrl = $directory.$fileName;

                $imageStore[] = $fileName;
        
                if(!Storage::disk('public')->exists('backEnd/images/contents'))
                {
                    Storage::disk('public')->makeDirectory('backEnd/images/contents');
                }


                //    delete old post image


                     $imageString = $content->file;



                      $imageArray = explode(',', $imageString);
                      $totalArray = count($imageArray);

                      if($totalArray >= 1){ 
                      $myImages = array_slice($imageArray, 0, $totalArray - 1);
                    }

                    foreach ($myImages as $image) {
                     if(Storage::disk('public')->exists('backEnd/images/contents/'.$image))
                          {
                             Storage::disk('public')->delete('backEnd/images/contents/'.$image);
                            }

                     }

        

               if($file->getClientOriginalExtension() == 'pdf' || $file->getClientOriginalExtension() == 'doc' || $file->getClientOriginalExtension() == 'docx' || $file->getClientOriginalExtension() == 'pptx' || $file->getClientOriginalExtension() == 'ppt'){

                   //Storage::disk('public')->put('backEnd/images/contents/'.$fileName,$file);
                  $file->move($directory,$imageUrl);
               }else{
                $contentImage = Image::make($file)->resize(1600,1600)->stream();
                Storage::disk('public')->put('backEnd/images/contents/'.$fileName,$contentImage);
               }


        }

        $checkImage = 1;

   }






        $content = Content::find($id);
         
        $content->faculty_id = $request->faculty_id;
        $content->department_id = $request->department_id;
        $content->program_id = $request->program_id;
        $content->semester_id = $request->semester_id;
        $content->course_id = $request->course_id;

        $content->title = $request->title;
        $content->description = $request->description;

         if($checkImage == 1){
           $myImageString='';
           
           foreach ($imageStore as $image){
             $myImageString .=  $image.',';
           }

         $content->file = $myImageString;
        }
        
       
        $content->save();

    	Toastr::info('Teacher course content updated !!','info');
    	return redirect()->route('teacher.content.index');
    }

     public function delete($id){

     	
    	$content = Content::findOrfail($id);

        //    delete old post image


                     $imageString = $content->file;



                      $imageArray = explode(',', $imageString);
                      $totalArray = count($imageArray);

                      if($totalArray >= 1){ 
                      $myImages = array_slice($imageArray, 0, $totalArray - 1);
                    }

                    foreach ($myImages as $image) {
                     if(Storage::disk('public')->exists('backEnd/images/contents/'.$image)){

                        Storage::disk('public')->delete('backEnd/images/contents/'.$image);
                        }

                     }
    	          $content->delete();

                	Toastr::error('Teacher content deleted !!','error');
                    return redirect()->route('teacher.content.index');
    }
    
}

