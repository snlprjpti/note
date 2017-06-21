@include('admin.session.messages')
<div class="col-md-3 all-form">
	  {!!Form::open(['route' => 'subject.store', 'method' => 'post'])!!}
		   
		       	<div class="form-group">
					{{Form::label('faculty_id','Faculty')}}
					{{Form::select('faculty_id',$faculties, null, array('placeholder'=> 'Choose Faculty','class' => 'form-control'))}}
					{!! $errors->first('faculty_id', '<span class="label label-danger" >:message</span >') !!}
					
				</div>	
				
				Semester<input type="radio" id="semester" name="choose"><br>
				Year   <input type="radio" id="year" name="choose">

				<div class="form-group" id="s" style="display: none">
					{{Form::label('semester','Semester')}}
					{{ Form::select('semester', array('sem 1' => 'semester 1', 'sem 2' => 'semester 2','sem 3' => 'semester 3', 'sem 4' => 'semester 4', 'sem 5' => 'semester 5','sem 6' => 'semester 6', 'sem 7' => 'semester 7','sem 8' => 'semester 8'),null, ['class' => 'form-control','placeholder' => 'Select Semester'])}}
					{!! $errors->first('grade', '<span class="label label-danger" >:message</span >') !!}
					
				</div>

				<div class="form-group" id="y" style="display: none">
					{{Form::label('year','Year')}}
					{{ Form::select('year', array( 'first year' => 'year1','second year' => 'year2', 'third year' => 'year3','forth year' => 'year4'),null, ['class' => 'form-control','placeholder' => 'Select Year' ])}}
					{!! $errors->first('grade', '<span class="label label-danger" >:message</span >') !!}

				</div>	

				 <div class="form-group">
		       		{{ Form::label('name','Subject Name')}}
		       		{{ Form::text('name', null, array('class' => 'form-control'))}}
					{!! $errors->first('name', '<span class="label label-danger" >:message</span >') !!}

		       	</div>
	       		<div class="form-group">
				       	<input type="radio" name="user_id" value="{{$user->id}}" checked="checked">{{$user->name}}<br>
			       		
			    </div>
		        <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
		    {!!Form::close()!!}
    </div>
</div>