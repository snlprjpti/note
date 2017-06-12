@if(Session::has('success'))
	<div id="messages"  class="alert alert-success" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
			{{Session::get('success')}}</p>
	</div>
@endif

@if(count($errors)>0)
	<div id="messages"  class="alert alert-danger" role="alert">
		<strong>Errors:</strong>
		<ul>
			@foreach($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
		</ul>

	</div>
@endif

@if(Session::has('delete'))
	<div  id="messages" class="alert alert-success" role="alert">
		<strong>{{Session::get('delete')}}</strong>
	</div>
@endif

@section('js')
<script type="text/javascript">
	$(document).ready(function(){
		setTimeout(function() {
            $('#messages').fadeOut('fast');
            }, 3000); 
	});
</script>
@endsection