@if(Session::has('success'))
	<span id="messages"  class="alert alert-success" role="alert">
			{{Session::get('success')}}</p>
	</span>
@endif


<!-- @if(Session::has('delete'))
	<div  id="messages" class="alert alert-info" role="alert">
		<strong>{{Session::get('delete')}}</strong>
	</div>
@endif -->
@if(Session::has('empty'))
	<div  id="messages" class="alert alert-danger" role="alert">
		<strong>{{Session::get('empty')}}</strong>
	</div>
@endif

	
@section('flash')
	<script type="text/javascript">
		$(document).ready(function(){
			setTimeout(function() {
	            $('#messages').fadeOut('fast');
	            }, 3000); 
		});
		

	</script>
@endsection