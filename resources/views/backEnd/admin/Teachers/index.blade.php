@extends('backEnd.admin.master')
@section('title','Admin show all teachers')
@section('main-content')
<div class="container">
  <div class="row mt-2">
    <div class="col-md-12">
      <a href="{{route('admin.teacher.registrar')}}"><button class="btn btn-info">Registrar Teacher</button></a>
    </div>
    
  </div>
  <div class="row mt-3">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Show All Teachers</h3>
        </div>
        <!-- /.card-header -->
        @if(count($teachers) > 0)
        <div class="card-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Serial</th>
                <th>Name</th>
                <th>Initial</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Address</th>
               
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($teachers as $teacher)
              <tr>
                <td>{{$loop->index + 1}}</td>
                
                <td>{{$teacher->name}}</td>
                <td>{{$teacher->initial}}</td>
                <td>{{$teacher->email}}</td>
                <td>{{$teacher->phone_number}}</td>
                <td>{{$teacher->address}}</td>
                
                <td>
                  
                  
                  <button class="btn btn-danger btn-sm" type="button" onclick="deleteteacher({{$teacher->id}})">
                  <i class="fa fa-trash"></i>
                  </button>
                  
                  <form id="delete_form_{{$teacher->id}}" method="post" action="{{route('admin.teacher.delete',['id'=>$teacher->id])}}" style="display: none;">
                    @method('DELETE')
                    @csrf
                  </form>
                </td>
                
              </tr>
              @endforeach
              @else
              <h3 class="text-danger p-5 text-center">No Teacher Registrar yet !!</h3>
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
    function deleteteacher(id) {
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