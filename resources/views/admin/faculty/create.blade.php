	@include('admin.session.messages')	
			<div class="col-md-3 all-form">
				<h5>Add Faculty</h5>
			 	{!!Form::open(['route' => 'faculty.store', 'method' => 'post'])!!}

		       			<div class="form-group">
		       				{{ Form::label('name','Faculty Name')}}
		       				{{ Form::text('name', null, array('class' => 'form-control'))}}
					{!! $errors->first('name', '<span class="label label-danger" >:message</span >') !!}
		       				
				       	</div>
				       	<div class="form-group">
		       				{{ Form::label('fullname','Full Name')}}
		       				{{ Form::text('fullname', null, array('class' => 'form-control'))}}
					{!! $errors->first('fullname', '<span class="label label-danger" >:message</span >') !!}

				       	</div> 	
				       	<input type="radio" name="user_id" value="{{$user->id}}" checked="checked">{{$user->name}}<br>

				        <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
				{!!Form::close()!!}
			</div>	

