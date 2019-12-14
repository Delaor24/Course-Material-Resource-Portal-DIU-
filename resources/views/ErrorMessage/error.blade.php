    @if ($errors->any())
	  <div class="m-3" style="width: 400px;">
	     <ul>
		   @foreach ($errors->all() as $error)
	        

	         <p class="alert alert-danger">{{$error}}</p>
		         
	        
		   @endforeach
	     </ul>
	  </div>
	@endif