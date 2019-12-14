<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{route('user.dashboard.index')}}" class="brand-link">
    <img src="{{asset('frontEnd/img/logo.jpeg')}}" alt="admin Logo" class="brand-image img-circle elevation-3"
    style="opacity: .8">
    <span class="brand-text font-weight-light">DIU COURSE CONTENT</span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <?php $profile = Auth::user();?>
        @if($profile->avatar)
        <img src="{{Storage::disk('public')->url('backEnd/users/profile/'.$profile->avatar)}}" class="img-circle elevation-2" alt="User Image">
        @else
        <img src="{{asset('backEnd/admin/profile/adminAvatar.png')}}" class="img-circle elevation-2" alt="User Image">
        @endif
        
      </div>
      <div class="info">
        <a href="#" class="d-block">{{$profile->name}}</a>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->
        <li class="nav-item has-treeview menu-open">
          <a href="{{route('user.dashboard.index')}}"  class="nav-link {{Request::is("user/dashboard*") ? "active" : ""}}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
              
            </p>
          </a>
          
        </li>
        <li class="nav-item">
          <a href="{{route('user.profile')}}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              profile
              <span class="right badge badge-danger">New</span>
            </p>
          </a>
        </li>


            <!-- user viewcontent-->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link {{Request::is("teacher/assign*") ? "active" : ""}}">
            <i class="nav-icon fas fa-copy"></i>
            <p>
             View Contents
              <i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right">1</span>
            </p>
          </a>
          <ul class="nav nav-treeview">
   
            <li class="nav-item">
              <a href="{{route('user.content.view')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>view content</p>
              </a>
            </li>
            
            
          </ul>
        </li>
        
      </ul>

</nav>
<!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>