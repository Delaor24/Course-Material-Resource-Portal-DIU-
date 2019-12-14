@extends('backEnd.users.master')


@section('main-content')
<div class="container">
	

	<div class="row mt-3">
		<div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Password Change</h3>
              </div>
              <div class="cart-body">
              	<?php $profile = Auth::user();

              	?>


           <form role="form" action="{{route('user.profile.password.store')}}" method="POST">
                @csrf
                <div class="card-body">

                  <div class="form-group">
                    <label for="oldpassword">Old Password</label>
                    <input type="password" class="form-control @error('old_password') is-invalid @enderror" id="oldpassword" name="old_password" autofocus placeholder="old password">
                         @if($errors->has('old_password'))
                    <span class="help-block">
                      <strong class="text-danger">{{ $errors->first('old_password') }}</strong>
                    </span>
                    @endif
                  </div>

                   <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" autofocus placeholder="new password (min: 6 char)">

                    @if($errors->has('password'))
                    <span class="help-block">
                      <strong class="text-danger">{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                  </div>
                   <div class="form-group">
                    <label for="confirm-password">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm-password" name="password_confirmation" placeholder="confirm password">
                  </div>

                


                 


               </div>

                 

                
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Change Password</button>
                </div>
              </form> 			

        
            </div>
            <!-- /.card -->

          

          </div>
	</div>
</div>
@endsection