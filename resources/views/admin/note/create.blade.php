@include('admin.session.messages')	
	<div class="col-md-3 all-form"">
			{!! Form::open(['route' => 'note.store','method'=>'post','files' => true]) !!}	  
				<div class="form-group">
					{{Form::label('name','Title')}}
					{{Form::text('name', null, array('class' => 'form-control'))}}
					{!! $errors->first('name', '<span class="label label-danger" >:message</span >') !!}

				</div>
				<div class="form-group">
					{{Form::label('faculty_id','Faculty')}}
					{{Form::select('faculty_id',$faculties, null, array('class' => 'form-control','id' => 'create'))}}
				</div>	
				Added By <input type="radio" name="user_id" value="{{$user->id}}" checked="checked">{{$user->name}}
				<div class="form-group">
					{{Form::label('subject_id','Subject')}}
					{{Form::select('subject_id',$subjects, null, array('class' => 'form-control'))}}
				</div>	
				<div class="form-group">
					{{Form::label('file','File')}}
					{{Form::file('file[]', array('class' => 'form-control','multiple' => 'true'))}}
				</div>
					{{Form::submit('Create', array('class' => 'btn btn-primary'))}}

			{!! Form::close() !!}
	</div>