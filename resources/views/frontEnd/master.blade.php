<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->

     @include('frontEnd.partials.styles')
  
    
    <title>@yield('title')</title>

    <style>
      .dropdownHover:hover{
        background-color: #0671cf;

      }
    </style>

  </head>
  <body>


    <nav class="navbar navbar-expand-lg navbar-light bg-dark" style="background-color: #1b3882!important;">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="{{route('frontEnd.home')}}">DIU_COURSE_INFORMATION</a>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
          <li class="nav-item active">
            <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
          </li>
          
        </ul>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="{{route('frontEnd.home')}}">HOME</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="{{route('contactUs')}}">CONTACT-US</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('aboutUs')}}">ABOUT-US</a>
          </li>
          @guest
          <li class="nav-item">
            <a class="nav-link" href="{{route('user.login')}}">SIGN IN</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('user.registrar')}}">SIGN UP</a>
          </li>
          @endguest
          
   <!--        <li class="nav-item">
     <div class="dropdown">
       <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: #1b3882;color: white">
       Notifications
       </button>
       <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="background-color: #0d0b4a;">
         <a class="dropdown-item dropdownHover" href="#">post 1</a>
         <a class="dropdown-item dropdownHover" href="#">post 2</a>
         <a class="dropdown-item dropdownHover" href="#">post 3</a>
         <a class="dropdown-item dropdownHover" href="#">post 4</a>
         <a class="dropdown-item dropdownHover" href="#">post 5</a>
         
       </div>
     </div>
   </li> -->


          @if(Auth::check())
            <li class="nav-item dropdown ml-1">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" style="background-color: #0671cf" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" v-pre >
                                                                      <?php 

                                      if(Auth::user()->avatar != NULL){ ?>
                                        <img src="{{Storage::disk('public')->url('backEnd/users/profile/'.Auth::user()->avatar)}}" alt="profile" style="width: 25px; height: 25px;">

                                     <?php }else{ ?>
                                        <img src="{{asset('frontEnd/img/avatar/adminAvatar.png')}}" alt="profile" style="width: 25px; height: 25px;">
                                      <?php }


                                      ?>
                                      
                                  
                                      {{ Auth::user()->username }}
                               
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="background-color: #1b3882;color: white">

                                    <a class="dropdown-item dropdownHover" href="{{ route('user.dashboard.index') }}">
                          
                                        {{ __('Dashboard') }}
                                    </a>

                                  
                                    <a class="dropdown-item dropdownHover" href="{{ route('user.logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
          @endif
        </ul>
        
      </div>
    </nav>
  


    @yield('slider')
    
   @yield('main-content')




  <!-- Footer -->
@include('frontEnd.partials.footer')
<!-- Footer -->


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
 @include('frontEnd.partials.scripts')
  
</body>
</html>