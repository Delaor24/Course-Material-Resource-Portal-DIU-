@extends('frontEnd.master')


@section('title','Teacher Login')
@section('main-content')
<div class="container">
  <div class="row">
    <div class="offset-3 col-6 offset-3">
      
      
      
      <div class="hold-transition login-page">
        <div class="login-box">
          <div class="login-logo">
            <b>Teacher</b><span style="font-weight: 12px;">LOGIN</span>
          </div>
          <!-- /.login-logo -->
          <div class="card">
            <div class="card-body login-card-body">
              <p class="login-box-msg">Sign in to start your session</p>
              <form action="{{route('teacher.login.process')}}" method="POST">
                @csrf
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
                    <button type="submit" class="btn btn-primary btn-block btn-flat"><i class="fa fa-sign-in" aria-hidden="true"></i> Sign In</button>
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
              <p class="mb-user.password.request">
                <a href="{{route('user.password.request')}}">I forgot my password</a>
              </p>
              <p class="mb-user.password.request">
                <a href="{{route('user.registrar')}}">I have not account</a>
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
