@extends('layout.admin')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-2 border-right">
			@include('admin.admin_sideNav')			
		</div>
		<!-- end sidenav -->

		<!-- start content -->
		<div class="col-md-9">
			<div class="row">
				<div class="col-md-12">
					<p class="text-center">Members</p>
					<div id="success" class="alert-success"></div>
					<div id="deleteBanner" class="alert-danger"></div>
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
		        <h5 class="modal-title">Edit Member</h5>
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
	
	//CREATE USER
	document.querySelector('#addMemberButton').addEventListener('click', () => {
		window.location = '/admin_member_create'
	})

	//RETREIVE USERS

	fetch('http://localhost:3000/', {
			method : "GET",
			headers : {
				'Content-Type' : 'application/json'
			}
		})
		.then(res => {
			return res.json()
		})
		.then(data => {
			// console.log(data)
			const user = data.data.user
			
			let userList = ' ';

			user.map(user => {
				// console.log(studio)
				userList += `
					<div class="card">
					  <div class="card-body">
					    <h5 class="card-title">Member email: ${user.email}</h5>
					    
					    <p class="card-text">Admin: ${user.admin}</p>
					    <a href="#" id="editButton" class="btn btn-primary" data-toggle="modal" data-target="#editUserModal" data-id="${user._id}">Edit</a>
					    <a href="#" id="deleteButton" class="btn btn-danger" data-id="${user._id}">Delete</a>
					  </div>
					</div>
					
				`				
			})
			document.querySelector('#userList').innerHTML = userList

		})

	//UPDATE USERS
		// retrieve single user to update
		document.querySelector('#userList').addEventListener('click', (e) => {
			console.log(e.target.id)

			if (e.target.id === 'editButton') {

				let editId = e.target.dataset.id
				// console.log(editId)

				// window.location = ('/admin_studio_edit' +editId);

				fetch('http://localhost:3000/' +editId)
					.then(res => {
						return res.json()
					})
					.then(data => {
						// console.log(data)
						const user = data.data.user
						// console.log(studio)
						let userDetails = '';

						userDetails += `
							{{ csrf_field() }}
							
							<input type="hidden" data-id=${user._id} id="editId"> 
							
							<input id="editEmail" type="email" data-id="${user._id}" class="form-control" name="email" value="${user.email}">

							<input id="editPassword" type="hidden" data-id="${user._id}" class="form-control" name="password" value="${user.password}">

							 <label for="admin" class="mt-3">Admin</label>
							    <select class="form-control " id="editAdmin" name="admin" data-id="${user._id} size="2">
							      <option value="false">No</option>
							      <option value="true">Yes</option>
							    </select>
								
							<button id="editSub" class="editSubmitButt btn btn-primary btn-block mt-3" data-dismiss="modal">Save</button>
						`
						document.querySelector('#editUser').innerHTML = userDetails
					})
			}
		})

		document.querySelector('#editUser').addEventListener('click', e => {
			// console.log(e.target.id)
			if(e.target.id === 'editSub'){
				let email = document.querySelector('#editEmail').value;
				let password = document.querySelector('#editPassword').value;
				let admin = document.querySelector('#editAdmin').value;

				// console.log(email)
				// console.log(password)
				// console.log(admin)

				let formData = new FormData()

				formData.email = email;
				formData.password = password;
				formData.admin = admin;

				let editId = document.querySelector('#editId').dataset.id
				// console.log(editId)
				// console.log(formData)

				fetch('http://localhost:3000/edit/' +editId, {
					method: "PUT",
					headers : {
						'Content-Type' : 'application/json'
					},
					body : JSON.stringify(formData)
				})
				.then(res=> {
					document.querySelector('#success').classList.add("alert-success")

					document.querySelector('#success').innerHTML = "Successfully edited"
					// window.location= '/admin_members'
				})
			}

		})

	//DELETE USERS

	document.querySelector('#userList').addEventListener('click', (e) => {
			if(e.target.id === 'deleteButton') {
				// console.log(e.target.dataset.id)
				
				if(!confirm ('are you sure?')) {
					return false
				}
				e.target.parentNode.remove()
				removeStudio(e.target.dataset.id)
			}

		})
		
		function removeStudio(id){
			// console.log(id)
		fetch('http://localhost:3000/delete', {
					method: "DELETE",
					headers : {
						'Content-Type' : 'application/json'
					},
					body : JSON.stringify({id})
				})

			document.querySelector('#deleteBanner').classList.add("alert-danger")

			document.querySelector('#deleteBanner').innerHTML = "User Deleted"
			// window.location= '/admin_members'
		}


</script>



@endsection