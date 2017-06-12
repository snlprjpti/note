@extends('admin.layout.main')
@section('title','Admin-Member')
@section('content')
	<a href="{{route('member.create')}}" class="add-user user" style="text-decoration: none;">Add User</a>
	<table class="table table-hover">
		<tr>
			<thead>
				<td>SN</td>
				<td>Username</td>
				<td>Email</td>
				<td>Users</td>
				<td>Created Date</td>
				<td>Updated Date</td>
				<td>Status</td>
				<td>Action</td>
			</thead>
		</tr>
		<?php $i = 1; ?>
		@forelse($members as $member)
		<tr>
			<tbody>
				<td>{{$i}}</td>
				<td>{{$member->name}}</td>
				<td>{{$member->email}}</td>
				<td>{{($member->admin == 1)?'Admin':'Member'}}</td>
				<td>{{$member->created_at->diffForHumans()}}</td>
				<td>{{$member->updated_at->diffForHumans()}}</td>
				<td>
				@if(Auth::user()->id == $member->id || $member->admin == 1)
					Active
				@elseif($member->status == 1)
					<button class="sts_button fa fa-square text-green" id="{{$member->id}}" value="0">
					</button>
				@elseif($member->status == 0)
					<button class="sts_button fa fa-square text-red" id="{{$member->id}}" value="1"></button>
				@endif
				
				<td>@if(Auth::user()->id != $member->id)
					
					<button onclick="edit({{json_encode($member)}})" class="btn-info" data-toggle="modal" value="{{$member->id}}" data-target="#Edit-member" id="edit">{{$member->id}}</button>
					
				<div class="modal fade" id="Edit-member" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;" >
				  	<div class="modal-dialog">
					  	<form action="{{route('member-update',['id'=> $member->id])}}" method="POST">				  
				    	<div class="modal-content">
				      		<div class="modal-header">
				        		<button type="button" class="close" id="edit-member" data-dismiss="modal" aria-hidden="true">×{{$member->id}}</button>
						        <h4 class="modal-title" id="myModalLabel"></h4>
					        </div>
							<div class="modal-body">
							  	<div class="form-group">
								   	<label>Name</label>
							  			<input type="text" name="name" class="form-control" id="edit-name">
							  	</div>	
								<div class="form-group">
								  	<label>E-mail</label>
							       	 	<input type="email" name="email" class="form-control" id="edit-email">
						       	</div>	
						       	<div class="form-group">
								  	<label>Users</label>
							       	 	Member<input type="radio" id="mem" name="admin" class="member"  value="0">
							       	 	Admin<input type="radio" name="admin" id="adm" value="1" class="member">
						       	</div>										      	
								<div class="modal-footer">
								    <button type="button" class="btn-danger" data-dismiss="modal">Close</button>
								    <button type="submit" class="btn-info">Save changes</button>
							    </div>
						    </div>
						    {{ csrf_field() }}
					    </form>
					    </div>
				  	</div>
				</div>


					<form method="post" action="#" style="float: right;">
						<button type="submit" class="btn-danger delete">Delete</button>
        				{{method_field('DELETE')}}
						{{csrf_field()}}
					</form>
					@endif
				</td>
			</tbody>
		</tr>
		<?php $i++;?>
		@empty<h4>No Users Available</h4>
		@endforelse
	</table>


@endsection



@section('js')
<script>

	$(document).ready(function(){
		$('.sts_button').on("click", function(){
			var member_sts = $(this).val();
			var sts = $(this).attr('id');

			if(member_sts == 1)
			{
				$('#'+sts).addClass("fa fa-square text-green");
			}
			else(member_sts == 0)
			{
				$('#'+sts).addClass("fa fa-square text-red");
			}

			$.ajax({
				type: "GET",
				url:"http://localhost:8000/admin/member/status",
				data:"id="+sts+"&status="+member_sts,
				success:function(res){
					$('#'+sts).html(res);
					var oldsts = $('#'+sts).val();

					if(oldsts == 1)
					{
						$('#'+sts).val(0);
						$('#'+sts).removeClass("fa fa-square text-red");
						$('#'+sts).addClass("fa fa-square text-green");
					}
					else
					{
						$('#'+sts).val(1);
						$('#'+sts).removeClass("fa fa-square text-green");
						$('#'+sts).addClass("fa fa-square text-red");
					}
				}
			})


		});
	});

		function edit(id){
			// console.log(id);	
			$('#edit-member').val(id.id);
			$('#edit-name').val(id.name);
			$('#edit-email').val(id.email);
			if(id.admin == 0)
			{
				$('#mem').prop('checked', true);
			}
			else{
				$('#adm').prop('checked', true);				
			}
		}

</script>
@endsection