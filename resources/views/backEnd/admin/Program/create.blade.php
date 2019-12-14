@extends('backEnd.admin.master')

@section('title','Admin program create')
@section('main-content')


<div class="container">
	
<div class="row mt-2">
    <div class="col-md-12">
      <a href="{{route('admin.program.index')}}"><button class="btn btn-info">View All Programs</button></a>
</div>
    
  </div>
	<div class="row mt-3">
		<div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Program Name</h3>
              </div>

             <!--error message-->
              @include('ErrorMessage.error')
              <!--error message end -->
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{route('admin.program.store')}}" method="POST">
              	@csrf
                <div class="card-body">

                  <div class="form-group">
                    <label for="programName">Program Name</label>
                    <input type="text" class="form-control" id="programName" name="programeName" placeholder="Enter program name">
                  </div>
                 </div>

                 

                
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Insert program</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          

          </div>
	</div>
</div>
@endsection