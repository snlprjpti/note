@include('admin.session.messages')	
	<div class="col-md-3 all-form"">
			{!! Form::open(['route' => ['note.update',$note->id] , 'method'=>'post','files' => true]) !!}	  
				<div class="form-group">
					{{Form::label('name','Title')}}
					{{Form::text('name', $note_edit->name, array('class' => 'form-control'))}}
					{!! $errors->first('name', '<span class="label label-danger" >:message</span >') !!}

				</div>
				<div class="form-group">
					{{Form::label('faculty_id','Faculty')}}
					{{Form::select('faculty_id',$faculties,$note_edit->faculty_id, array('class' => 'form-control','id' => 'create'))}}
				</div>	
				Added By <input type="radio" name="user_id" value="{{$note->user->name}}" checked="checked">{{$note->user->name}}
				<div class="form-group">
					{{Form::label('subject_id','Subject')}}
					{{Form::select('subject_id',$subjects,Request::get('subject_id'), array('class' => 'form-control'))}}
				</div>	
				<div class="form-group">
					{{Form::label('file','File')}}
					{{Form::file('file[]', array('class' => 'form-control','multiple' => 'true'))}}
				</div>
					{{Form::submit('Create', array('class' => 'btn btn-primary'))}}

			{!! Form::close() !!}
	</div>d