@extends('backEnd.admin.master')

@section('title','Admin Departments')
@section('main-content')
<div class="container">

	<div class="row mt-2">
		<div class="col-md-12">
			<a href="{{route('admin.department.create')}}"><button class="btn btn-info">Add New Department</button></a>
		</div>
		
	</div>
	<div class="row mt-3">
		<div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Show All Departments Name</h3>
            </div>
            <!-- /.card-header -->

          @if(count($departments) > 0)
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Serial</th>
                  <th>Department Name</th>
                  <th>Faculty Name</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
             	@foreach($departments as $department)
                <tr>
                  <td>{{$loop->index + 1}}</td>
                  
                  <td>{{$department->departmentName}}</td>
                  <td>{{$department->faculty->facultyName}}</td>
                  <td>

                  	<button class="btn btn-info btn-sm">
                  		<a href="{{route('admin.department.edit',['id'=>$department->id])}}" style="color:black;">
                  			<i class="fa fa-edit"></i>
                  		</a>
                  	</button>


                  
                  		<button class="btn btn-danger btn-sm" type="button" onclick="deletedepartment({{$department->id}})">
                          <i class="fa fa-trash"></i>
                    </button>
                  


		                  	<form id="delete_form_{{$department->id}}" method="post" action="{{route('admin.department.delete',['id'=>$department->id])}}" style="display: none;">
		                  		@method('DELETE')
		                  		@csrf

		                  	</form>

                  </td>
                  
                </tr>
               @endforeach

               @else
               <h3 class="text-danger p-5 text-center">No Deartment create yet !!</h3>
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


@push('js')

<script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>

 <script src="https://use.fontawesome.com/3d1aefa331.js"></script>

 <script type="text/javascript">
        function deletedepartment(id) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete_form_'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>
@endpush