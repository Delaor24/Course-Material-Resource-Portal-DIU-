@extends('backEnd.admin.master')

@section('title','Admin update profile')
@section('main-content')
<div class="container">
	

	<div class="row mt-3">
		<div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Profile</h3>
              </div>
              <div class="cart-body">
              	<?php $profile = Auth::user();

              	?>


              	 <!--error message-->
              @include('ErrorMessage.error')
              <!--error message end -->
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{route('admin.profile.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                  <div class="form-group">
                    <label for="programName">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$profile->name}}">
                  </div>

                   <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{$profile->email}}">
                  </div>

                


                   <div class="form-group">
                    <label for="file">Change Profile Photo</label>
                    
                       <input type="file" class="form-control" name="file" class="custom-file-input" id="file">
                  
                    </div>


               </div>

                 

                
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update Profile</button>
                </div>
              </form>				

        
            </div>
            <!-- /.card -->

          

          </div>
	</div>
</div>
@endsection