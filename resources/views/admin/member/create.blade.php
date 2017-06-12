@extends('admin.layout.main')
@section('title','Admin-Member')
@section('content')

	<div class="row">
		<div class="col-md-5 col-md-offset-3">
			{!! Form::open(['route' => 'member.store','method'=>'post']) !!}

			<div class="form-group">
				{{Form::label('name','Name')}}
				{{Form::text('name', null, array('class' => 'form-control'))}}
			</div>
			<div class="form-group">
				{{Form::label('email','Email')}}
				{{Form::email('email', null, array('class' => 'form-control'))}}	 
			</div>				
			<div class="form-group">
				{{Form::label('password','Password')}}
				{{Form::password('password', null, array('class' => 'form-control'))}}
			</div>	
				<div class="form-group">
				{{Form::label('password','Confirm Password')}}
				{{Form::password('password_confirmation', null, array('class' => 'form-control'))}}
			</div>	
				{{Form::submit('Create', array('class' => 'btn btn-primary'))}}

				{!! Form::close() !!}
		</div>								
	</div>


@endsection