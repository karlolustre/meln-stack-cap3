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
				<div class="col-md-6 border p-5">
						<div class="form-group">
							<label for="email">Email: </label>
							<input type="text" id="email" class="form-control" name="email" placeholder="sample@sample.com">
							<label for="password">Password: </label>
							<input type="password" id="password" class="form-control" name="password">
							
							<div class="form-group">
							    <label for="admin">Admin</label>
							    <select class="form-control" id="admin" name="admin" size="2">
							      <option value="false">No</option>
							      <option value="true">Yes</option>
							    </select>
						  	</div>

						</div>
						<button id="" class="btn btn-primary">Back</button>
						<button id="addMemberButton" class="btn btn-primary">Add Member</button>
				</div>
			</div>
		</div>
	</div> <!-- end row -->

</div> <!-- end container -->

	
	<script>
		// CREATE studio
		document.querySelector('#addMemberButton').addEventListener('click', () => {
			let email = document.querySelector('#email').value
			let password = document.querySelector('#password').value
			let admin = document.querySelector('#admin').value

			// console.log(email)
			// console.log(password)
			// console.log(admin)

			let formData = new FormData();

			formData.email = email
			formData.password = password
			formData.admin = admin

			fetch('http://localhost:3000/register', {
			method : "POST",
			headers : {
				'Content-Type' : 'application/json'
			},
			body: JSON.stringify(formData)
			}).then(res => res.json())
			.then(data => {
			// console.log(data)
			window.location = ('/admin_members');
		})

		.catch(error => console.error('Error:', error))

	})


	</script>

@endsection