@extends('backEnd.users.master')
@section('title','user view content')
@section('main-content')
<div class="container">
  
  <div class="row mt-3">
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">user view content each semester</h3>
        </div>
        <!--error message-->
        @include('ErrorMessage.error')
        <!--error message end -->
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="{{route('user.content.get')}}" method="GET">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label>Select Faculty Name</label>
              <select class="form-control" name="faculty_id">
                
                @foreach(App\Model\Admin\Faculty::all() as $faculty)
                <option value="{{$faculty->id}}">{{$faculty->facultyName}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Select Department Name</label>
              <select class="form-control" name="department_id">
                
                @foreach(App\Model\Admin\Department::all() as $department)
                <option value="{{$department->id}}">{{$department->departmentName}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Select Program Name</label>
              <select class="form-control" name="program_id">
                
                @foreach(App\Model\Admin\Program::all() as $program)
                <option value="{{$program->id}}">{{$program->programeName}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Select Semester Name</label>
              <select class="form-control" name="semester_id">
               
                @foreach(App\Model\Admin\Semester::all() as $semester)
                <option value="{{$semester->id}}">{{$semester->semesterName}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Select Course Name</label>
              <select class="form-control" name="course_id">
               
                @foreach(App\Model\Admin\Course::all() as $course)
                <option value="{{$course->id}}">{{$course->courseName}} | {{$course->courseCode}} </option>
                @endforeach
              </select>
            </div>

          
            
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">view contents</button>
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