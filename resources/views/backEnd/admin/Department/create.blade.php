@extends('backEnd.admin.master')

@section('title','Admin Department create')
@section('main-content')


<div class="container">
	
<div class="row mt-2">
    <div class="col-md-12">
      <a href="{{route('admin.department.index')}}"><button class="btn btn-info">View All Departments</button></a>
</div>
    
  </div>
	<div class="row mt-3">
		<div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Department Name</h3>
              </div>

             <!--error message-->
              @include('ErrorMessage.error')
              <!--error message end -->
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{route('admin.department.store')}}" method="POST">
              	@csrf
                <div class="card-body">

                  <div class="form-group">
                    <label for="departmentName">Department Name</label>
                    <input type="text" class="form-control" id="departmentName" name="departmentName" placeholder="Enter department name">
                  </div>


                  <div class="form-group">
                    <label>Select Faculty Name</label>
                    <select class="form-control" name="faculty_id">
                      @foreach(App\Model\Admin\Faculty::all() as $faculty)
                      <option value="{{$faculty->id}}">{{$faculty->facultyName}}</option>
                     @endforeach
                    </select>
                  </div>
                 </div>

                 

                
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Insert Department</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          

          </div>
	</div>
</div>
@endsection