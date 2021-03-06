<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
 @include('backEnd.teachers.partials.style')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

 @include('backEnd.teachers.partials.nav')

  <!-- Main Sidebar Container -->
  @include('backEnd.teachers.partials.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">


        @yield('main-content')
       
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 @include('backEnd.teachers.partials.footer')
</div>
<!-- ./wrapper -->

@include('backEnd.teachers.partials.script')

{!! Toastr::message() !!}
</body>
</html>
