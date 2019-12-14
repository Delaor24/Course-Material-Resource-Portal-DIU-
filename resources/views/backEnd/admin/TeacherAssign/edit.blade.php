@extends('backEnd.admin.master')

@section('title','Admin Edi Assign Course')
@section('main-content')


<div class="container">
	
<div class="row mt-2">
    <div class="col-md-12">
      <a href="{{route('admin.teacherAssign.index')}}"><button class="btn btn-info">View Assign courses</button></a>
</div>
    
  </div>
	<div class="row mt-3">
		<div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update course Assign to Teacher</h3>
              </div>

             <!--error message-->
              @include('ErrorMessage.error')
              <!--error message end -->
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{route('admin.teacherAssign.update',['id'=>$teacherAssign->id])}}" method="POST">
                @method('PUT')
              	@csrf

                <div class="card-body">

                     <div class="form-group">
                    <label>Select Teacher Name</label>
                    <select class="form-control" name="teacher_id">
                      
                    @foreach(App\Model\Teacher\Teacher::all() as $teacher)
                      <option {{ $teacherAssign->teacher_id == $teacher->id ? 'selected' : '' }}  value="{{$teacher->id}}">{{$teacher->name}}</option>
                     @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Select Faculty Name</label>
                    <select class="form-control" name="faculty_id">
                     
                      @foreach(App\Model\Admin\Faculty::all() as $faculty)
                      <option {{ $teacherAssign->faculty_id == $faculty->id ? 'selected' : '' }}  value="{{$faculty->id}}">{{$faculty->facultyName}}</option>
                     @endforeach
                    </select>
                  </div>

                 <div class="form-group">
                    <label>Select Department Name</label>
                    <select class="form-control" name="department_id">
                     
                      @foreach(App\Model\Admin\Department::all() as $department)
                      <option {{ $teacherAssign->department_id == $department->id ? 'selected' : '' }}  value="{{$department->id}}">{{$department->departmentName}}</option>
                     @endforeach
                    </select>
                  </div>

                    <div class="form-group">
                    <label>Select Program Name</label>
                    <select class="form-control" name="program_id">
                     
                      @foreach(App\Model\Admin\Program::all() as $program)
                      <option {{ $teacherAssign->program_id == $program->id ? 'selected' : '' }}  value="{{$program->id}}">{{$program->programeName}}</option>
                     @endforeach
                    </select>
                  </div>

                    <div class="form-group">
                    <label>Select Semester Name</label>

                    <select class="form-control" name="semester_id">
                     
                      @foreach(App\Model\Admin\Semester::all() as $semester)
                      <option {{ $teacherAssign->semester_id == $semester->id ? 'selected' : '' }}  value="{{$semester->id}}">{{$semester->semesterName}}</option>
                     @endforeach
                    </select>
                  </div>

                    <div class="form-group">
                    <label>Select Course Name</label>
                    <select class="form-control" name="course_id">
                     
                      @foreach(App\Model\Admin\Course::all() as $course)
                      <option {{ $teacherAssign->course_id == $course->id ? 'selected' : '' }}  value="{{$course->id}}">{{$course->courseName}} | {{$course->courseCode}} </option>
                     @endforeach
                    </select>
                  </div>

            
               </div>

                
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update Assign Course</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          

          </div>
	</div>
</div>
@endsection