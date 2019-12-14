@extends('backEnd.admin.master')

@section('title','Admin semester update')
@section('main-content')


<div class="container">
	
<div class="row mt-2">
    <div class="col-md-12">
      <a href="{{route('admin.semester.index')}}"><button class="btn btn-info">View All semesters</button></a>
</div>
    
  </div>
	<div class="row mt-3">
		<div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add semester Name</h3>
              </div>

             <!--error message-->
              @include('ErrorMessage.error')
              <!--error message end -->
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{route('admin.semester.update',['id'=>$semester->id])}}" method="POST">
                @method('PUT')
              	@csrf

                <div class="card-body">

                  <div class="form-group">
                    <label for="facultyName">semester Name</label>
                    <input type="text" class="form-control" id="facultyName" name="semesterName" value="{{$semester->semesterName}}">
                  </div>

                    <div class="form-group">
                    <label>Select Program Name</label>
                    <select class="form-control" name="faculty_id">
                      @foreach(App\Model\Admin\Program::all() as $program)
                      <option {{ $semester->program_id == $program->id ? 'selected' : '' }} value="{{$program->id}}">{{$program->programeName}}</option>
                     @endforeach
                    </select>
                  </div>
               </div>

                
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update Semester</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          

          </div>
	</div>
</div>
@endsection