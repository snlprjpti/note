@extends('admin.layout.main')
@section('title','Subject')
@section('breadcrumb')
	<ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Subject</li>
     </ol>
@endsection
@section('content')

	<div class="row">
  		<div class="col-md-8 ">
  			@if(Session::has('error'))
			<div id="messages"  class="alert alert-danger" role="alert">
				<strong>{{Session::get('error')}}</strong>
			</div>
		@endif
		@if(Session::has('delete'))
			<div  id="messages" class="alert alert-info" role="alert">
				<strong>{{Session::get('delete')}}</strong>
			</div>
		@endif
		</div>
	</div>
			<div class="row">
				<div class="col-md-8 content-table">
					
			<table id="datatable" class="table table-responsive">
				<thead>
					<tr>
						<td>SN</td>
						<td>Faculty</td>
						<td>Grade</td>
						<td>Subject Name</td>
						<td>Action</td>
						<td></td>
					</tr>
				</thead>
				<?php $i = 1; ?>
				@forelse($subjects as $subject)
				<tbody>
					<tr>
						<td>{{$i}}</td>
						<td>{{$subject->faculty->name}}</td>
						<td>{{$subject->grade}}</td>
						<td>{{$subject->name}}</td>
						<td>
							<a class="btn-lg" href="{{route('subject.edit', $subject->id)}}"><i class="fa fa-edit"></i></a>
						</td>
						<td>		
							<form method="post" action="{{route('subject.destroy',$subject->id)}}">
								<button class="btn-danger" type="submit"><i class="fa fa-trash"></i></button>
								{{csrf_field()}}
							{{method_field('DELETE')}}
							</form>

						</td>
					</tr>
				</tbody>
				<?php $i++; ?>
					@empty<h4>No subjects</h4>
				@endforelse
			</table>	
	  </div>
	  @if(\Request::segment(4) == 'edit')
	  	@include('admin.subject.edit')
	  @else
	  	@include('admin.subject.create')
	  @endif	
	  	
@endsection

	@section('js')
		<script type="text/javascript">
			$(document).ready(function(){
				$('#semester').click(function(){
					$('#s').show();
					$('#y').hide();				
				});
				$('#year').click(function(){
					$('#s').hide();
					$('#y').show();	
				});
			});

			
        $(document).ready(function() {
			    $('#datatable').DataTable();
			});


</script>
	@endsection	