<!-- jQuery -->
<script src="{{asset('frontEnd/js/jquery-2.2.4.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('frontEnd/js/popper.min.js')}}"></script>
<script src="{{asset('frontEnd/js/bootstrap.min.js')}}"></script>

<script src="{{asset('toastr/toastr.min.js')}}"></script>

{!! Toastr::message() !!}

@stack('js')