@extends('backEnd.teachers.master')
@section('title','Teacher content upload')
@section('main-content')
<div class="container">
  
  <div class="row mt-2">
    <div class="col-md-12">
      <a href="{{route('teacher.content.index')}}"><button class="btn btn-info">View All contents</button></a>
    </div>
    
  </div>
  <div class="row mt-3">
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Add course Content Each Semester</h3>
        </div>
        <!--error message-->
        @include('ErrorMessage.error')
        <!--error message end -->
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="{{route('teacher.content.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label>Select Faculty Name</label>
              <select class="form-control" name="faculty_id">
                
                @foreach($faculties as $faculty)
                <option value="{{$faculty->id}}">{{$faculty->facultyName}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Select Department Name</label>
              <select class="form-control" name="department_id">
                
                @foreach($departments as $department)
                <option value="{{$department->id}}">{{$department->departmentName}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Select Program Name</label>
              <select class="form-control" name="program_id">
                
                @foreach($programes as $program)
                <option value="{{$program->id}}">{{$program->programeName}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Select Semester Name</label>
              <select class="form-control" name="semester_id">
               
                @foreach($semesters as $semester)
                <option value="{{$semester->id}}">{{$semester->semesterName}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Select Course Name</label>
              <select class="form-control" name="course_id">
               
                @foreach($courses as $course)
                <option value="{{$course->id}}">{{$course->courseName}} | {{$course->courseCode}} </option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <div class="card card-outline">
                <label for="title">Content Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter title name">
              </div>
              
              <div class="form-group">
                <label for="description">Content Description</label>
                
                <div class="mb-3">
                  <textarea class="textarea" name="description" style="width: 100%; height: 300px; font-size: 14px; line-height: 18px;  padding: 10px;">
                  </textarea>
                  
                  
                </div>
              </div>
            </div>
            
            
            <div class="form-group">
              <label for="fileInput">File input</label>
              <div class="imageArea">
                <button class="addFile float-right btn btn-success">Add More file</button>
                <div class="my-2">
                  <input type="file" name="file[]" multiple="true">
                </div>
              </div>
              
             
              
            </div>
            
            
            
            
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Insert Content</button>
            </div>
          </div>
        </form>
      </div>
      <!-- /.card -->
      
    </div>
  </div>
</div>
@endsection
@push('css')
<style>
.card-primary:not(.card-outline) .card-header{
background-color: #71b2e3;
}
</style>
@endpush

@push('js')
<script>
  $(document).ready(function() {
  var max_fields      = 10; //maximum input boxes allowed
  var wrapper       = $(".imageArea"); //Fields wrapper
  var add_button      = $(".addFile"); //Add button ID
  
  var x = 1; //initlal text box count
  $(add_button).click(function(e){ //on add input button click
    e.preventDefault();
    if(x < max_fields){ //max input box allowed
      x++; //text box increment
      $(wrapper).append('<div class="my-2"><input type="file" name="file[]" multiple="true"> <a href="#" class="remove_field text-danger">Remove</a></div>'); //add input box
    }
  });
  
  $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
    e.preventDefault(); $(this).parent('div').remove(); x--;
  })
});

</script>

@endpush