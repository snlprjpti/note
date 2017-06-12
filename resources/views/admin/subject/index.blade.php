@extends('admin.layout.main')
@section('content')
<div class="navbar">
  <a class="navbar-brand" href="#">subjects:</a>
    <ul class="nav navbar-nav">
  		@if(!empty($subjects))
	   		@forelse($subjects as $subject)
	   		<li>
	   		<a href="{{route('subject.show',$subject->id)}}">{{$subject->name}}</a>
	   		</li>
	   			@empty
	   			<li>No Data</li>
	   		@endforelse
   		@endif    
      </a>
    </ul>
 		<a href="#modal-id" class="btn btn-primary" data-toggle="modal">Add Subject</a>
    	<div class="modal fade" tabindex="-1" id="modal-id" role="dialog">
		  <div class="modal-dialog" role="document">
		  {!!Form::open(['route' => 'subject.store', 'method' => 'post'])!!}

		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">Add Subject</h4>
		      </div>
		      <div class="modal-body">
		       	<div class="form-group">
		       		{{ Form::label('name',('Name'))}}
		       		{{ Form::text('name', null, array('class' => 'form-control'))}}
		       	</div>
		       	 	<div class="form-group">
				{{Form::label('faculty_id','Faculty')}}
				{{Form::select('faculty_id',$faculties, null, array('class' => 'form-control'))}}
			</div>	
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-primary">Save changes</button>
		      </div>
		    </div><!-- /.modal-content -->
		    {!!Form::close()!!}
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	</div>  	   		
@endsection