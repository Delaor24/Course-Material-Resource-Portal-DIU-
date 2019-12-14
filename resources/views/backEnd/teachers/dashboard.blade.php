@extends('backEnd.teachers.master')
@section('title','Teacher Dashboard')
@section('main-content')
<!-- Small boxes (Stat box) -->
<div class="row">
  <div class="col-lg-3 col-6">
    <!-- total faculty end-->
    <div class="small-box bg-info">
      <div class="inner">
        <h3>{{count(App\Model\Teacher\Teacher::find(Auth::id())->teacherAssigns)}}</h3>
        <a href="{{route('teacher.teacherAssign.index')}}"><p>Assign Courses</p></a>
      </div>
      <div class="icon">
        <i class="ion ion-bag"></i>
      </div>
      <a href="{{route('teacher.teacherAssign.index')}}" class="small-box-footer">View Course<i class="fas fa-arrow-circle-right"></i></a>
    </div>
    <!-- total faculty end-->

        <!-- total faculty end-->
    <div class="small-box bg-success">
      <div class="inner">
        <h3>{{count(App\Model\Admin\Content::where('user_id',Auth::id())->get())}}</h3>
        <a href="{{route('teacher.content.index')}}"><p>Content Uploads</p></a>
      </div>
      <div class="icon">
        <i class="ion ion-bag"></i>
      </div>
      <a href="{{route('teacher.content.index')}}" class="small-box-footer">View All Contents<i class="fas fa-arrow-circle-right"></i></a>
    </div>
    <!-- total faculty end-->

  </div>
  
  <!-- ./col -->
</div>
<!-- /.row -->

@endsection