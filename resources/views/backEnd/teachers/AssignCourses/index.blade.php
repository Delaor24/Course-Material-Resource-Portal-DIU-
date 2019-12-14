@extends('backEnd.teachers.master')

@section('title','Teacher assign Course')
@section('main-content')
<div class="container">

	<div class="row mt-3">
		<div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Show All Courses Name</h3>
            </div>
            <!-- /.card-header -->

          @if(count($teacherAssigns) > 0)
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Serial</th>
                  <th>Teacher Name</th>
                  <th>Faculty Name</th>
                  <th>Department Name</th>
                  <th>Program Name</th>
                  <th>Semester Name</th>
                  <th>Course Name</th>
             
                </tr>
                </thead>
                <tbody>
             	@foreach($teacherAssigns as $teacherAssign)
                <tr>
                  <td>{{$loop->index + 1}}</td>
                  
                  <td>{{$teacherAssign->teacher->name}}</td>
                  <td>{{$teacherAssign->faculty->facultyName}}</td>
                  <td>{{$teacherAssign->department->departmentName}}</td>
                  <td>{{$teacherAssign->program->programeName}}</td>
                  <td>{{$teacherAssign->semester->semesterName}}</td>
                  <td>{{$teacherAssign->course->courseName}}</td>
                

                  
                </tr>
               @endforeach

               @else
               <h3 class="text-danger p-5 text-center">No course Assign to teacher!!</h3>
               @endif
               
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
	</div>
</div>

@endsection
