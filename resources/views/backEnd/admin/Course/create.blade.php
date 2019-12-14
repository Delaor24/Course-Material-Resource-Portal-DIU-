@extends('backEnd.admin.master')

@section('title','Admin course create')
@section('main-content')


<div class="container">
	
<div class="row mt-2">
    <div class="col-md-12">
      <a href="{{route('admin.course.index')}}"><button class="btn btn-info">View All courses</button></a>
</div>
    
  </div>
	<div class="row mt-3">
		<div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add course Name</h3>
              </div>

             <!--error message-->
              @include('ErrorMessage.error')
              <!--error message end -->
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{route('admin.course.store')}}" method="POST">
              	@csrf
                <div class="card-body">

                  <div class="form-group">
                    <label for="courseName">course Name</label>
                    <input type="text" class="form-control" id="courseName" name="courseName" placeholder="Enter course name">
                  </div>

                   <div class="form-group">
                    <label for="courseCode">course code</label>
                    <input type="text" class="form-control" id="courseCode" name="courseCode" placeholder="Enter course name">
                  </div>


                  <div class="form-group">
                    <label>Select Semester Name</label>
                    <select class="form-control" name="semester_id">
                      @foreach(App\Model\Admin\Semester::all() as $semester)
                      <option value="{{$semester->id}}">{{$semester->semesterName}}</option>
                     @endforeach
                    </select>
                  </div>
                 </div>

                 

                
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Insert Course</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          

          </div>
	</div>
</div>
@endsection