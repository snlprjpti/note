@extends('admin.layout.main')
@section('content')
<h4>Faculty</h4>
 	
 	<a href="#modal-id" class="btn btn-primary" data-toggle="modal">Add Faculty</a>
	@include('admin.session.messages')

	<div class="navbar">
	   <ul class="nav navbar-nav">
  		@if(!empty($faculties))
	   		@forelse($faculties as $faculty)
	   		<li>
	   			<a href="{{route('faculty.show',$faculty->id)}}">{{$faculty->name}}</a>
	   		</li>
	   		@empty
	   			<li>No Data</li>
	   		@endforelse
   		@endif    
      </a>
    </ul>
 	
    	<div class="modal fade" tabindex="-1" id="modal-id" role="dialog">
		  <div class="modal-dialog" role="document">
		  {!!Form::open(['route' => 'faculty.store', 'method' => 'post'])!!}

		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">Add Faculty</h4>
		      </div>
		      <div class="modal-body">
		       	<div class="form-group">
		       		{{ Form::label('name','Faculty Name')}}
		       		{{ Form::text('name', null, array('class' => 'form-control'))}}
		       	</div> 	
		       	<div class="form-group">
		       		{{ Form::label('user_id','Added By')}}
		       		{{ Form::select('user_id',$user, null, array('class' => 'form-control'))}}
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
	@if(!empty($semesters))
	<section>
		<h3>Subjects</h3>
		<table class="table table-stripped">
			<thead>
				<tr>
					<th>Subject</th>
					<th>No. of Note</th>
					<th>Added By</th>
				</tr>
			</thead>
			<tbody>
				@forelse($semesters as $semester)
				<tr>
					<td>{{$semester->name}}</td>
					<td>{{}}</td>
				</tr>
				@empty
				<tr><td>No Data</td></tr>
				@endforelse
			</tbody>
		</table>
	</section>
	@endif


@endsection