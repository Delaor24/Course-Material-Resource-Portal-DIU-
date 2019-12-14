@extends('backEnd.admin.master')

@section('title','Admin contents')
@section('main-content')
<div class="container">

	<div class="row mt-2">
		<div class="col-md-12">
			<a href="{{route('admin.content.create')}}"><button class="btn btn-info">Add New Content</button></a>
		</div>
		
	</div>
	<div class="row mt-3">
		<div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Show All Content</h3>
            </div>

            <!-- /.card-header -->

          @if(count($contents) > 0)
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Serial</th>
                  <th>Content Title</th>
                  <th>Course Name</th>
                  <th>Course Code</th>
                  <th>Semester</th>
                  <th>Department</th>
                  <th>Status</th>
                  <th>file</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
             	@foreach($contents as $content)
                <tr>
                  <td>{{$loop->index + 1}}</td>
                  
                  <td>{{$content->title}}</td>
                  <td>{{ $content->course->courseName }}</td>
                  <td>{{$content->course->courseCode}}</td>
                  <td>{{$content->semester->semesterName}}</td>
                  <td>{{$content->department->departmentName}}</td>

                  <td>
                    <?php
                       $status = $content->status;

                       if($status == 0){ ?>

                        <a href="{{ route('admin.content.status',['id' => $content->id]) }}" class="btn btn-danger btn-sm">pending</a>
                     <?php  } 
                       else { ?>
                        <a href="{{ route('admin.content.status',['id' => $content->id]) }}" class="btn btn-success btn-sm">Active</a>
                     <?php  }


                     ?>
                     
                   </td>
                  <td>
                    <?php $imageString = $content->file;



                      $imageArray = explode(',', $imageString);
                      $totalArray = count($imageArray);

                      if($totalArray >= 1){ 
                      $myImages = array_slice($imageArray, 0, $totalArray - 1);
                    }

                      foreach ($myImages as $image) { ?>


                      <a target="_blank" href="{{Storage::disk('public')->url('backEnd/images/contents/'.$image)}} ">
                        

                        <img src="{{Storage::disk('public')->url('backEnd/images/contents/'.$image)}}" alt='{{$image}}' style="width: 
                        30px;" /> </a> 

                      <?php }

                    


                     ?>

                  </td>


               

                  <td>

                  	<button class="btn btn-info btn-sm">
                  		<a href="{{route('admin.content.edit',['id'=>$content->id])}}" style="color:black;">
                  			<i class="fa fa-edit"></i>
                  		</a>
                  	</button>


                  
                  		<button class="btn btn-danger btn-sm" type="button" onclick="deletecontent({{$content->id}})">
                          <i class="fa fa-trash"></i>
                    </button>
                  


		                  	<form id="delete_form_{{$content->id}}" method="post" action="{{route('admin.content.delete',['id'=>$content->id])}}" style="display: none;">
		                  		@method('DELETE')
		                  		@csrf

		                  	</form>

                  </td>
                  
                </tr>
               @endforeach

               @else
               <h3 class="text-danger p-5 text-center">No Content create yet !!</h3>
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
        function deletecontent(id) {
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