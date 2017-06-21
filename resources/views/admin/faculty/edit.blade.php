			<div class="col-md-3 all-form"> 
				<h5>Edit Faculty</h5>
					 @include('admin.session.messages')

			 	{!!Form::open(['route' => ['faculty.update', $faculty_edit->id], 'method' => 'PUT'])!!}

		       			<div class="form-group">
		       				{{ Form::label('name','Faculty Name')}}
		       				{{ Form::text('name', $faculty_edit->name, array('class' => 'form-control'))}}
				       	</div>
				       	<div class="form-group">
		       				{{ Form::label('fullname','Full Name')}}
		       				{{ Form::text('fullname', $faculty_edit->fullname, array('class' => 'form-control'))}}
				       	</div> 	
				       	<div class="form-group">
				       		
				       	<strong>Added By</strong><i>{{$faculty_edit->user->name}}</i>
				       	</div>
				    
				        <button type="submit" class="btn btn-primary">Update</button>
				{!!Form::close()!!}
			</div>	

