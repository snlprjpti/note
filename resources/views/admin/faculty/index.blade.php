@extends('admin.layout.main')
@section('title','Faculty')
@section('breadcrumb')
	<ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Faculty</li>
     </ol>
@endsection
@section('content')

<div class="row">
	<div class="col-md-8 content-table">		
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
		
		<table class="table table-responsive" id="datatable">
			<tr>
				<thead>
					<td>SN</td>
					<td>Faculty Name</td>
					<td>FullForm</td>
					<td>Added By</td>
					<td>Action</td>
					<td></td>
				</thead>
			</tr>
			<?php $i = 1;?>
			@forelse($faculties as $faculty)
				<tbody>
					<td>{{$i}}</td>
					<td>{{$faculty->name}}</td>
					<td>{{$faculty->fullname}}</td>
					<td>{{$faculty->user->name}}</td>
					<td><a href="{{route('faculty.edit',['id' => $faculty->id])}}" class="btn-lg"><i class="fa fa-edit"></i></a></td>
						<td><form action="{{route('faculty.destroy',$faculty->id)}}" method="post">
							<button type="submit" class="btn-danger"><i class="fa fa-trash"></i></button>
							{{csrf_field()}}
							{{method_field('DELETE')}}
						</form>
					</td>
				</tbody>
			<?php $i++ ?>
			@empty<h2>No Faculty Available</h2>
			@endforelse
		</table>

	</div>
	@if(\Request::segment(4) == 'edit')
		@include('admin.faculty.edit')
	@else
		@include('admin.faculty.create')
	@endif
</div>
		
@endsection

@section('js')
		<script type="text/javascript">
	
	        $(document).ready(function() {
			    $('#datatable').DataTable();
			});
		
	</script>
@endsection