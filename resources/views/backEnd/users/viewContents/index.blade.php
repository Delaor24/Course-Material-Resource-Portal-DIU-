@extends('backEnd.users.master')

@section('title','User view contents')
@section('main-content')
<div class="container">

	<div class="row mt-2">
		<div class="col-md-12">
			<a href="{{route('user.content.view')}}"><button class="btn btn-info">Search more info</button></a>
		</div>
		
	</div>
	<div class="row mt-3">
		<div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">View Contents</h3>
            </div>

            <!-- /.card-header -->

          @if(count($contents) > 0)
            <div class="card-body mb-5">

             @foreach($contents as $content)
            
              <div class="container">
                <div class="row">
                  <div class="col-7">
                     <h3 class="text-dark"><strong>Title : </strong>{{$content->title}} <span class="badge badge-info" style="font-size: 12px;">{{$content->created_at->diffForhumans()}}</span></h3>
                     <p><strong>Description : </strong>{{$content->description}}</p>

                     <div class="m-6">
                       <?php $imageString = $content->file;



                      $imageArray = explode(',', $imageString);
                      $totalArray = count($imageArray);

                      if($totalArray >= 1){ 
                      $myImages = array_slice($imageArray, 0, $totalArray - 1);
                    }

                      foreach ($myImages as $image) { ?>

                      
                      <a target="_blank" href="{{Storage::disk('public')->url('backEnd/images/contents/'.$image)}} ">

                        <img src="{{Storage::disk('public')->url('backEnd/images/contents/'.$image)}}" alt='{{$image}}' style="width: 
                        100px;" /> </a> 

                      <?php }

                    


                     ?>
                     </div>

                     <hr>

                     <div>
               
                       <h4>Comments</h4>
                       <hr>
                      <div>

                        @foreach(App\Model\Admin\Content::find($content->id)->comments as $comment)
                       <div class="d-flex">
                        <div class="mr-2">

                           @if($comment->user->avatar)
                            <img  width="20px" height="20px" src="{{Storage::disk('public')->url('backEnd/users/profile/'.$comment->user->avatar)}}" class="img-circle elevation-2" alt="User Image">
                           @else
                            <img width="20px" height="20px" src="{{asset('backEnd/admin/profile/adminAvatar.png')}}" alt="userProfile">
                           @endif
                          
                        </div>
                         
                          <div>
                            <p>{{$comment->user->name}}</p>
                          </div>

                       </div>

                       <p>{{$comment->comment}}</p>

                           <div id="replyform_{{$comment->id}}" style="display: none;">
                             <form action="{{route('reply.store')}}" method="post">

                               @csrf
                              <input type="hidden" value="{{$comment->id}}" name="comment_id">
                              <input type="hidden" value="{{Auth::id()}}" name="user_id">

                              <div class="from-group form-inline ml-4">
                                <input type="text" name="reply" class="form-control" style="height: 30px" placeholder="reply">
                               <button type="submit" class="btn btn-sm btn-outline-info ml-1">Reply</button>
                               <button id="cancelButton_{{$comment->id}}" class="btn btn-sm btn-danger ml-1">cancel</button>
                              </div>
                           
                            </form>
                        </div>

                     


                          <span class="ml-2"><button id="replyButton_{{$comment->id}}" class="btn btn-sm btn-success" onclick="replyFunction({{$comment->id}})">Reply</button></span>

                   

                       @foreach(App\Model\Admin\Comment::find($comment->id)->replies as $reply)
                         <div class="d-flex ml-4">
                        @if($reply->user->avatar)
                            <img  width="20px" height="20px" src="{{Storage::disk('public')->url('backEnd/users/profile/'.$reply->user->avatar)}}" class="img-circle elevation-2" alt="User Image">
                           @else
                            <img width="20px" height="20px" src="{{asset('backEnd/admin/profile/adminAvatar.png')}}" alt="userProfile">
                           @endif
                         
                          <div class="ml-1">
                          <p>{{$reply->user->name}}</p>
                          </div>
                       </div>
                       <p class="ml-5">{{$reply->reply}} <span class="badge badge-info">{{$reply->created_at->diffForHumans()}}</span></p>

                         

                       @endforeach

                   @endforeach
                    


                     


                         
                      </div>

                       <div class="mt-2">
                         <form action="{{route('comment.store')}}" method = "POST">
                          @csrf
                          <input type="hidden" value="{{$content->id}}" name="content_id">
                           <input type="hidden" value="{{Auth::id()}}" name="user_id">
                          <div class="from-group form-inline">
                            <input type="text" class="form-control" name="comment" style="height: 30px" placeholder="comment title">
                           <button type="submit" class="btn btn-sm btn-info ml-1">post</button>
                          </div>
                           
                         </form>
                       </div>
                     </div>
                  </div>

                  @if(count($teacherAssigns) > 0)
                  <div class="col-5" style="border-left: 1px solid #C2E7EC">
                    
                    <h5 class="text-success text-info"><strong>This course will take these teachers</strong></h5>
                    @foreach($teacherAssigns as $teacherAssign)
                     <p style="color: #1B3882"><strong>{{$teacherAssign->teacher->name}}</strong> <span class="text-info ml-2">Contact :{{$teacherAssign->teacher->phone_number}}</span></p>
                    @endforeach
                  
                  </div>
                    @endif
                </div>
              </div>
             @endforeach              
            </div>
          @else
           <h4 class="text-center text-danger m-5">No content found</h4>
          @endif
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



    <script>



      function replyFunction(id){

      $('#replyButton_'+ id).on('click',function(e){
        e.preventDefault();
        $(this).hide();

        $('#replyform_'+id).show();
     
      })

      $('#cancelButton_'+ id).on('click',function(e){
        e.preventDefault();
        $(this).hide();

        $('#replyform_'+id).hide();
     
      })


      }

    
       

    </script>
@endpush