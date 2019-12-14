@extends('backEnd.teachers.master')
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
          <div class="row">
            <div class="col-md-4">
              @if($profile->avatar)
              <img src="{{Storage::disk('public')->url('backEnd/teachers/profile/'.$profile->avatar)}}" alt="Profile image" style="width: 100%;height: auto;">
              @else
              <img src="{{asset('frontEnd/img/avatar/adminAvatar.png')}}" alt="Profile default">
              @endif
            </div>
            <div class="col-md-8">
              <p class="well"><strong>Name : </strong>{{$profile->name}}</p>
              <p class="well"><strong>Email : </strong>{{$profile->email}}</p>
              <a href="{{route('teacher.profile.update')}}" class="btn btn-info" >Edit Profile</a>
              <a href="{{route('teacher.profile.password.change')}}" class="btn btn-info" >Change Password</a>
            </div>
          </div>
        </div>
        
      </div>
      <!-- /.card -->
      
    </div>
  </div>
</div>
@endsection