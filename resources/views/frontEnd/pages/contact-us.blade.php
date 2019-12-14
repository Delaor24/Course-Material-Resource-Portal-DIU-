@extends('frontEnd.master')
@section('title')
DAFFODIL COURSE INFORMATION | contact us
@endsection
@section('main-content')
<div class="container p-5">
	<div class="row">
		<div class="col-12">
			<h3 class="text-center text-info py-3">Contact Us</h3>
			<hr>
			<div>
				<form action="{{route('contactUs')}}" method="POST">
					@csrf
					<div class="offset-2 col-8">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Full Name" name="name">
						</div>
					</div>

					<div class="offset-2 col-8">
						<div class="form-group">
							<input type="email" class="form-control" placeholder="Enter your email" name="email">
						</div>
					</div>

					<div class="offset-2 col-8">
						<div class="form-group">
							<textarea name="message" id="" cols="10" rows="5" class="form-control" placeholder="Message"></textarea>
						</div>
					</div>

					<div class="offset-2 col-8">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Address" name="address">
						</div>
					</div>

					<div class="offset-2 col-8">
						<div class="form-group">
							<button class="btn btn-info" type="submit">Send Message</button>
						</div>
					</div>
					
				</form>
			</div>
			
			
		</div>
		
	</div>
</div>
@endsection