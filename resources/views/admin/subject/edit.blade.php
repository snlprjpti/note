@include('admin.session.messages')
	
	<div class="col-md-3 all-form">
	  	{!!Form::open(['route' => ['subject.update',$subject_edit->id], 'method' => 'PUT'])!!}
		   	<div class="form-group">
				{{Form::label('name','Subject Name')}}
				{{Form::text('name',$subject_edit->name, array('class' => 'form-control'))}}
			</div>
			<div class="form-group">
				{{Form::label('faculty_id','Faculty')}}
				{{Form::select('faculty_id',$faculties, array('class' => 'form-control'))}}
			</div>
			<div class="form-group">
				{{Form::label('grade','Grade')}}
				{{Form::text('grade',$subject_edit->grade, array('class' => 'form-control'))}}
			</div>
				
			
			    <strong>Added By</strong><i>{{$subject_edit->user->name}}</i><br>
		        <button type="submit" class="btn btn-primary">Update</button>
		{!!Form::close()!!}
    </div>
</div>