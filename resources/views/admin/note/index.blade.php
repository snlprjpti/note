@extends('admin.layout.main')
@section('content')
	<!-- add notes modal -->
	<div class="row">
	<a href="#" class="add" data-toggle = "modal" data-target = "#add-notes" style="float: left;">Add Notes</a>  

	</div>
	<div class="modal fade" id="add-notes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;" >			  	  
		<div class="modal-dialog">
			{!! Form::open(['route' => 'note.store','method'=>'post','files' => true]) !!}	  
    		<div class="modal-content">
      			<div class="modal-header">
        			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		        	<h4 class="modal-title" id="myModalLabel"></h4>
		        </div>
				<div class="modal-body">	
					<div class="form-group">
						{{Form::label('name','Name')}}
						{{Form::text('name', null, array('class' => 'form-control'))}}
					</div>
					<div class="form-group">
						{{Form::label('description','Description')}}
						{{Form::text('description', null, array('class' => 'form-control'))}}	 
					</div>				
					<div class="form-group">
						{{Form::label('faculty_id','Faculty')}}
						{{Form::select('faculty_id',$faculties, null, array('class' => 'form-control','id' => 'create'))}}
					</div>	
					<div class="form-group">
						{{Form::label('subject_id','Subject')}}
						{{Form::select('subject_id',$subjects, null, array('class' => 'form-control'))}}
					</div>	
					<div class="form-group">
						{{Form::label('file','File')}}
						{{Form::file('file[]', array('class' => 'form-control','multiple' => 'multiple'))}}
					</div>
						{{Form::submit('Create', array('class' => 'btn btn-primary'))}}

						{!! Form::close() !!}
				</div>								
			</div>
		</div>
	</div>
	<form action="{{route('note.delete')}}" method="POST">
		<button type="submit" id="delete" class="btn-danger delete">Delete Selected</button>
		<?php $count =1;?>
	@forelse($notes as $note)
	@if($count<11)
	<div class="col-md-1">
	<input id="checkbox" type="checkbox" name="id[]" value="{{$note->id}}" multiple>
        <span data-toggle="tooltip" data-placement="right" title="{{$note->description}}">
        @if(pathinfo($note->file, PATHINFO_EXTENSION) == 'pdf')
        <a href="{{URL::to('back/files/'.$note->file)}}" target="_blank">
       		<img id="trigger" src="{{asset('back/images/files/pdf.jpg')}}" class="file-image"></a>
       		@elseif((pathinfo($note->file, PATHINFO_EXTENSION) == 'docx'))
        <a href="{{URL::to('back/files/'.$note->file)}}" target="_blank">

       		<img src="{{asset('back/images/files/docx.png')}}" class="file-image"></a>
       		@elseif((pathinfo($note->file, PATHINFO_EXTENSION) == 'xlsx'))
        <a href="{{URL::to('back/files/'.$note->file)}}" target="_blank">   		
       		<img src="{{asset('back/images/files/excel.png')}}" class="file-image"></a>
       		@else 
        <a href="{{URL::to('back/files/'.$note->file)}}" target="_blank">
       		<img src="{{asset('back/images/files/docx.png')}}"  class="file-image"></a></span>
       	@endif
       	<button class="btn-primary fa fa-download">
          <a href="{{URL::to('back/files/'.$note->file)}}" download="{{$note->file}}">dddd
          </a></button>

    </div>
    	@endif
    	<?php $count++;?>
		@empty
		<h3>No note Available</h3>

	@endforelse
              
   {{csrf_field()}}
    </div>
        </form>

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
    </script>
@endsection
