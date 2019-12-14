<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{route('admin.dashboard.index')}}" class="brand-link">
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
        <img src="{{Storage::disk('public')->url('backEnd/admin/profile/'.$profile->avatar)}}" class="img-circle elevation-2" alt="User Image">
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
          <a href="{{route('admin.dashboard.index')}}"  class="nav-link {{Request::is("admin/dashboard*") ? "active" : ""}}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
              
            </p>
          </a>
          
        </li>
        <li class="nav-item">
          <a href="{{route('admin.profile')}}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              profile
              <span class="right badge badge-danger">New</span>
            </p>
          </a>
        </li>


            <!-- teacher-->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link {{Request::is("admin/teachers*") ? "active" : ""}}">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Teachers
              <i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right">2</span>
            </p>
          </a>
          <ul class="nav nav-treeview">
            
            <li class="nav-item">
              <a href="{{route('admin.teacher.registrar')}}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Teacher Registration
                  <span class="right badge badge-danger">New</span>
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('admin.teacher.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>All Teachers</p>
              </a>
            </li>
            
            
          </ul>
        </li>
        <!-- teacher end -->

          <!-- teacher assign course-->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link {{Request::is("admin/teacher/assign*") ? "active" : ""}}">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Course Assign
              <i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right">2</span>
            </p>
          </a>
          <ul class="nav nav-treeview">
            
            <li class="nav-item">
              <a href="{{route('admin.teacherAssign.create')}}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Course Assign To Teacher
                  <span class="right badge badge-danger">New</span>
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('admin.teacherAssign.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>All Assign Course</p>
              </a>
            </li>
            
            
          </ul>
        </li>
        <!-- teacher assign course end -->


        <!-- faculty-->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link {{Request::is("admin/faculty*") ? "active" : ""}}">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Faculty
              <i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right">2</span>
            </p>
          </a>
          <ul class="nav nav-treeview">
            
            <li class="nav-item">
              <a href="{{route('admin.faculty.create')}}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Faculty Create
                  <span class="right badge badge-danger">New</span>
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('admin.faculty.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>All Faculties</p>
              </a>
            </li>
            
            
          </ul>
        </li>
        <!-- faculty end -->
        <!-- Departments-->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link {{Request::is("admin/department*") ? "active" : ""}}">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Departments
              <i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right">2</span>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('admin.department.create')}}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Department Create
                  <span class="right badge badge-danger">New</span>
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('admin.department.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>All Departments</p>
              </a>
            </li>
            
            
          </ul>
        </li>
        <!-- Departments end -->
        <!-- Programs-->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link {{Request::is("admin/program*") ? "active" : ""}}">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Programs
              <i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right">2</span>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('admin.program.create')}}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Program Create
                  <span class="right badge badge-danger">New</span>
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('admin.program.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>All Programs</p>
              </a>
            </li>
            
            
          </ul>
        </li>
        <!-- Programs end -->
    
        <!-- Semesters-->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link {{Request::is("admin/semester*") ? "active" : ""}}">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Semesters
              <i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right">2</span>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('admin.semester.create')}}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Semester Create
                  <span class="right badge badge-danger">New</span>
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('admin.semester.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>All semesters</p>
              </a>
            </li>
            
            
          </ul>
        </li>
        <!-- Semesters end -->

            <!-- Courses-->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link {{Request::is("admin/course*") ? "active" : ""}}">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Courses
              <i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right">2</span>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('admin.course.create')}}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Course Create
                  <span class="right badge badge-danger">New</span>
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('admin.course.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>All Courses</p>
              </a>
            </li>
            
            
          </ul>
        </li>
        <!-- Courses end -->
        
        <!-- Course Contents-->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link {{Request::is("admin/content/course-content-each-semester*") ? "active" : ""}}">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Content Upload
              <i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right">2</span>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('admin.content.create')}}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  content Create
                  <span class="right badge badge-danger">New</span>
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('admin.content.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>All contents</p>
              </a>
            </li>
            
            
          </ul>
        </li>
        <!-- Course Contents end -->
         <!-- Course Contents-->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link {{Request::is("admin/users*") ? "active" : ""}}">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Mail Inbox
              <i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right">2</span>
            </p>
          </a>
          <ul class="nav nav-treeview">
        
            <li class="nav-item">
              <a href="{{route('admin.contact.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>All Incomming Message</p>
              </a>
            </li>
            
            
          </ul>
        </li>
        <!-- Course Contents end -->

        <!-- profile settings-->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link {{Request::is("admin/setting*") ? "active" : ""}}">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Settings
              <i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right">2</span>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('admin.profile')}}"  class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Profile</p>
              </a>
            </li>
            <button class="btn btn-danger btn-sm" >
            <a href="{{ route('admin.logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
            </a>
            </button>
            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
            
            
          </ul>
        </li>
        <!-- profile settings end -->
        
      </ul>
      
      
    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>