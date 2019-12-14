@extends('backEnd.admin.master')

@section('title','Admin Faculty update')
@section('main-content')


<div class="container">
	
<div class="row mt-2">
    <div class="col-md-12">
      <a href="{{route('admin.faculty.index')}}"><button class="btn btn-info">View All Facuties</button></a>
</div>
    
  </div>
	<div class="row mt-3">
		<div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Faculty Name</h3>
              </div>

             <!--error message-->
              @include('ErrorMessage.error')
              <!--error message end -->
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{route('admin.faculty.update',['id'=>$faculty->id])}}" method="POST">
                @method('PUT')
              	@csrf

                <div class="card-body">

                  <div class="form-group">
                    <label for="facultyName">Faculty Name</label>
                    <input type="text" class="form-control" id="facultyName" name="facultyName" value="{{$faculty->facultyName}}">
                  </div>
               </div>

                
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update Faculty</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          

          </div>
	</div>
</div>
@endsection