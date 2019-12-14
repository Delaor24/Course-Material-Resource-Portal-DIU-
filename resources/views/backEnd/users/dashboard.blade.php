@extends('backEnd.users.master')
@section('title','User Dashboard')
@section('main-content')
<!-- Small boxes (Stat box) -->
<div class="row">
  <div class="col-lg-3 col-6">
    <!-- total faculty end-->
    <div class="small-box bg-info">
      <div class="inner">
        <h3>{{count(App\Model\Admin\Content::all())}}</h3>
        <a href="#"><p>Total Content</p></a>
      </div>
      <div class="icon">
        <i class="ion ion-bag"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
    <!-- total faculty end-->
  </div>
  
  <!-- ./col -->
</div>
<!-- /.row -->

@endsection