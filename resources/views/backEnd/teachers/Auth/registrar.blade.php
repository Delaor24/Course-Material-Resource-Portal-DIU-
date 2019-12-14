@extends('frontEnd.master')
@section('title','User Registration')
@section('main-content')
<div class="container" style="background-image: url('frontEnd/img/registration-bg.jpg'); background-repeat: no-repeat;background-attachment:fixed;background-size: cover;">
  <div class="row">
    <div class="offset-3 col-6 offset-3">
      
      
      
      <div class="hold-transition register-page">
        <div class="login-box">
          <div class="login-logo">
            <b>User</b><span style="font-weight: 12px;">REGISTRATION</span>
          </div>
          <!-- /.login-logo -->
          <div class="card">
            <div class="card-body login-card-body">
              <p class="login-box-msg">Register a new membership</p>
              <form action="{{route('user.registrar')}}" method="POST">
                @csrf
                <div class="input-group mb-3 {{ $errors->has('name') ? 'has-error' : '' }}">
                  <input type="text" class="form-control" placeholder="Full Name" name="name" value="{{old('name')}}">
                  
                  <div class="input-group-append input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                  <div class="w-100">
                    @if($errors->has('name'))
                    <span class="help-block">
                      <strong class="text-danger">{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>
                <div class="input-group mb-3 {{ $errors->has('username') ? 'has-error' : '' }}">
                  <input type="text" class="form-control" placeholder="Username" name="username" value="{{old('username')}}">
                  
                  <div class="input-group-append input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                  <div class="w-100">
                    @if($errors->has('username'))
                    <span class="help-block">
                      <strong class="text-danger">{{ $errors->first('username') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>
                
                <div class="input-group mb-3 {{ $errors->has('email') ? 'has-error' : '' }}">
                  <input type="email" class="form-control" placeholder="Email" name="email" value="{{old('email')}}">
                  
                  <div class="input-group-append input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                  <div class="w-100">
                    @if($errors->has('email'))
                    <span class="help-block">
                      <strong class="text-danger">{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                  </div>
                  
                </div>
                <div class="input-group mb-3 {{ $errors->has('phone_number') ? 'has-error' : '' }}">
                  <input type="number" min="0" class="form-control" placeholder="phone_number" name="phone_number" value="{{old('phone_number')}}">
                  
                  <div class="input-group-append input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                  <div class="w-100">
                    @if($errors->has('phone_number'))
                    <span class="help-block">
                      <strong class="text-danger">{{ $errors->first('phone_number') }}</strong>
                    </span>
                    @endif
                  </div>
                  
                </div>
                <div class="input-group mb-3 {{ $errors->has('address') ? 'has-error' : '' }}">
                  <input type="text" class="form-control" placeholder="Adress (optional)" address="address" value="{{old('address')}}">
                  
                  <div class="input-group-append input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                  <div class="w-100">
                    @if($errors->has('address'))
                    <span class="help-block">
                      <strong class="text-danger">{{ $errors->first('address') }}</strong>
                    </span>
                    @endif
                  </div>
                  
                </div>
                <div class="input-group mb-3 {{ $errors->has('password') ? 'has-error' : '' }}">
                  <input type="password" class="form-control" placeholder="Password" name="password">
                  
                  <div class="input-group-append input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                  <div class="w-100">
                    @if($errors->has('password'))
                    <span class="help-block">
                      <strong class="text-danger">{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>
                <div class="input-group mb-3 {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                  <input type="password" class="form-control" placeholder="Retype Password" name="password_confirmation">
                  
                  <div class="input-group-append input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                  <div class="w-100">
                    @if($errors->has('password_confirmation'))
                    <span class="help-block">
                      <strong class="text-danger">{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>
                <div class="row">
                  <div class="col-8">
                    <div class="icheck-primary">
                      <input type="checkbox" id="remember" name="remember">
                      <label for="remember">
                        Remember Me
                      </label>
                    </div>
                  </div>
                  <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat"><i class="fa fa-sign-in" aria-hidden="true"></i> Sign up</button>
                  </div>
                </div>
                
              </form>
              <div class="social-auth-links text-center mb-3">
                <p>- OR -</p>
                <a href="#" class="btn btn-block btn-primary">
                  <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                </a>
                <a href="#" class="btn btn-block btn-danger">
                  <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                </a>
              </div>
              <!-- /.social-auth-links -->
              <p class="mb-1">
                <a href="{{route('user.login')}}">I have allrady account</a>
              </p>
              <p class="mb-1">
                <a href="#">I forgot my password</a>
              </p>
              
            </div>
            <!-- /.login-card-body -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection