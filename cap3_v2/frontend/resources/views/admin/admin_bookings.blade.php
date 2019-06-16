@extends('layout.admin')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-2 border">
			@include('admin.admin_sideNav')			
		</div>
		<!-- end sidenav -->

		<!-- start content -->
		<div class="col-md-9 border">
			<div class="row">
				<div class="col-md-12 border">
					<p class="text-center">Members</p>
					<ul id="userList">
						
					</ul>
					<button id="addMemberButton" class="btn btn-primary">Add Member</button>
				</div>
			</div> <!-- end nested row -->
		</div>
	</div> <!-- end row -->


	<!-- edit modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="editUserModal">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title">Edit User</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <p>Please fill in the required fields</p>
		        <form action="" id="editUser">
				
		        </form>
		      </div>
		    </div>
		  </div>
		</div> <!-- end new song modal -->



</div> <!-- end container -->

<script>
	
	//CREATE bookings
	document.querySelector('#addMemberButton').addEventListener('click', () => {
		window.location = '/admin_member_create'
	})



@endsection