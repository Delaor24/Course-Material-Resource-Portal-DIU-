@extends('backEnd.admin.master')

@section('title','Admin Dashboard')
@section('main-content')


 <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
             <!-- total faculty end-->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{count(App\Model\Admin\Faculty::all())}}</h3>

                <a href="{{route('admin.faculty.index')}}"><p>Total Faculty</p></a>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{route('admin.faculty.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>

             <!-- total faculty end-->


            <!-- total department -->
             <div class="small-box bg-success">
              <div class="inner">
                <h3>{{count(App\Model\Admin\Department::all())}}</h3>

                <a href="{{route('admin.department.index')}}"><p>Total Department</p></a>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{route('admin.department.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>


            <!-- total department end-->




              <!-- total program -->
             <div class="small-box bg-light">
              <div class="inner">
                <h3>{{count(App\Model\Admin\Program::all())}}</h3>

                <a href="{{route('admin.program.index')}}"><p>Total program</p></a>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{route('admin.program.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>


            <!-- total program end-->
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
           <div class="small-box bg-danger">
              <div class="inner">
               <h3>{{count(App\Model\Admin\TeacherAssign::all())}}</h3>

               <a href="{{route('admin.teacherAssign.index')}}"> <p>Course Assign Teachers</p> </a>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="{{route('admin.teacherAssign.index')}}" class="small-box-footer">View Assign Course <i class="fas fa-arrow-circle-right"></i></a>
            </div>


             <!-- total course -->
             <div class="small-box bg-info">
              <div class="inner">
                <h3>{{count(App\Model\Admin\Course::all())}}</h3>

                <a href="{{route('admin.course.index')}}"><p>Total course</p></a>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{route('admin.course.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>


            <!-- total course end-->

            <!-- total course -->
             <div class="small-box bg-success">
              <div class="inner">
                <h3>{{count(App\Model\Admin\Semester::all())}}</h3>

                <a href="{{route('admin.semester.index')}}"><p>Total Semester</p></a>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{route('admin.semester.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>


            <!-- total course end-->

          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{count(App\User::all())}}</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>

              <div class="small-box bg-info">
              <div class="inner">
                <h3>{{count(App\Model\Admin\Content::all()) }}</h3>

                <a href="{{ route('admin.content.index')}}"><p>Total Content Uploads</p></a>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{ route('admin.content.index')}}" class="small-box-footer">View Contents <i class="fas fa-arrow-circle-right"></i></a>
            </div>

          </div>
          
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
               <h3>{{count(App\Model\Teacher\Teacher::all())}}</h3>

               <a href="{{route('admin.teacher.index')}}"> <p>Teachers</p></a>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="{{route('admin.teacher.index')}}" class="small-box-footer">View Teachers <i class="fas fa-arrow-circle-right"></i></a>
            </div>

              <div class="small-box bg-success">
              <div class="inner">
               <h3>{{count(App\Contact::all())}}</h3>

               <a href="{{route('admin.contact.index')}}"> <p>Incomming Mail</p></a>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="{{route('admin.contact.index')}}" class="small-box-footer">View Inbox Message <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

         
        </div>
        <!-- /.row -->
      
@endsection