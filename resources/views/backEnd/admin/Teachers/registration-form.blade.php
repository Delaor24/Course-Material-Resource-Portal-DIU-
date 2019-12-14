@extends('backEnd.admin.master')
@section('title','Admin Teacher create')
@section('main-content')
<div class="container">
  
  <div class="row mt-2">
    <div class="col-md-12">
      <a href="{{route('admin.teacher.index')}}"><button class="btn btn-info">View All Teachers</button></a>
    </div>
    
  </div>
  <div class="row mt-3">
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Teachers Registration</h3>
        </div>
       
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="{{route('admin.teacher.registrar')}}" method="POST">
          @csrf
          <div class="card-body">
            
            
            <div class="form-group">
              
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter Full Name" value="{{old('name')}}" autofocus>
              @error('name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            
            
            <div class="form-group">
              
              <input type="text" class="form-control  @error('initial') is-invalid @enderror" id="initial" name="initial" placeholder="Enter Initial" value="{{old('initial')}}">

              @error('initial')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            
            
            <div class="form-group">
              
              <input type="email" class="form-control  @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter Email" value="{{old('email')}}">

              @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            
            <div class="form-group">
              
              <input type="number" class="form-control  @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" placeholder="8801xxxxxxxxx" value="{{old('phone_number')}}">

              @error('phone_number')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            
            <div class="form-group">
              
              <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" value="{{old('address')}}">


            </div>
            <div class="form-group">
              
              <input type="password" class="form-control  @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter password">
              @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror

            </div>
            <div class="form-group">
              
              <input type="password" class="form-control" id="confirmed" name="password_confirmation" placeholder="Confirm password">
            </div>
            
            
            
            
          </div>
          
          
          <div class="card-footer">
            <button type="submit" class="btn btn-info">Registrar Teacher</button>
          </div>
        </form>
      </div>
      <!-- /.card -->
      
    </div>
  </div>
</div>
@endsection