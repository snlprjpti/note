@extends('admin.layout.main')
@section('title','Notes')
@section('breadcrumb')
	 <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Notes</li>
      </ol>
@endsection
@section('content')
	<div class="row">
		<div class="col-md-8 content-table">
			<table class="table table-hover" id="datatable">
				<thead>
					<tr>
						<td>Sn</td>
						<td>Title</td>
						<td>Faculty</td>
						<td>Semester</td>
						<td>Subject</td>
						<td>Action</td>
					</tr>
				</thead>
				<tbody>
				<form action="{{route('note.delete')}}" method="POST">
					<button type="submit" id="delete" class="btn-danger delete">Delete Selected</button>
					<?php $count =1;?>

					@forelse($notes as $note)
					<tr>
						<td>{{$count}}</td>
						<td>{{$note->name}}<br>
							<input id="checkbox" type="checkbox" name="id[]" value="{{$note->id}}" multiple>
						        <span data-toggle="tooltip" data-placement="right" title="{{$note->description}}">
						        @if(pathinfo($note->file, PATHINFO_EXTENSION) == 'pdf')
						        	<a href="{{URL::to('back/files/'.$note->file)}}" target="_blank">
						       		<img id="trigger" src="{{asset('back/images/files/pdf-thumbnail.jpg')}}"></a>
						       	@elseif((pathinfo($note->file, PATHINFO_EXTENSION) == 'docx'))
						        	<a href="{{URL::to('back/files/'.$note->file)}}" target="_blank">
						       		<img src="{{asset('back/images/files/docx-thumbnail.png')}}"></a>
					       		@elseif((pathinfo($note->file, PATHINFO_EXTENSION) == 'xlsx'))
							        <a href="{{URL::to('back/files/'.$note->file)}}" target="_blank">   		
						       		<img src="{{asset('back/images/files/excel-thumbnail.png')}}"></a>
					       		@else 
							        <a href="{{URL::to('back/files/'.$note->file)}}" target="_blank">
						       		<img src="{{asset('back/images/files/docx-thumbnail.png')}}" ></a></span>
						       	@endif
						       	<br>
					       			
				          			<a href="{{URL::to('back/files/'.$note->file)}}" download="{{$note->file}}"><i class="btn-primary fa fa-download"></i></a>
						</td>
						<td>{{$note->faculty->name}}</td>
						<td>{{$note->subject->grade}}</td>
						<td>{{$note->subject->name}}</td>
						<td>
							<a href="{{route('note.edit',['id' => $note->id])}}" class="btn-lg"><i class="fa fa-edit"></i></a>
						</td>
					</tr>
					<?php $count++;?>
					@empty
					<h3>No note Available</h3>
				@endforelse
              
  	 		{{csrf_field()}}
        </form>

				</tbody>
			</table>

		</div>

		@if(\Request::segment(4) == 'edit')
			@include('admin.note.edit')
		@else
			@include('admin.note.create')
		@endif
	</div>

  	

@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $('#delete').prop("disabled","true");
            $('input:checkbox').click(function() {
                    if ($(this).is(':checked')) {
                        $('#delete').prop("disabled", false);
                    } else {
                        if ($('#checkbox').filter(':checked').length < 1){
                            $('#delete').attr('disabled',true);}
                    }

            });
        });

        $(document).ready(function() {
			    $('#datatable').DataTable();
			});


    </script>
@endsection