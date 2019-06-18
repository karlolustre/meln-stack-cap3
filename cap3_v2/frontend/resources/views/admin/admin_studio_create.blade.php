@extends('layout.admin')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-2 border-right">
			@include('admin.admin_sideNav')			
		</div>
		<!-- end sidenav -->

		<!-- start content -->
		<div class="col-md-9 border">
			<div class="row">
				<div class="col-md-6 p-5 mx-auto">
						<div class="form-group">
							<label for="name">Name: </label>
							<input type="text" id="name" class="form-control" name="name" placeholder="Studio Name" >
							<span id="nameErr" class="alert"></span>

							<label for="desc">Description: </label>
							<input type="text" id="desc" class="form-control" name="desc" placeholder=" Description">
							<label for="price">Price: </label>
							<input type="number" id="price" class="form-control" name="price" placeholder=" Price">
							<label for="seats">Quantity: </label>
							<input type="number" id="seats" class="form-control" name="seats" >
						</div>
						<a href="/admin_studios" class="btn btn-primary">Back</a>
						<button id="addStudioButton" class="btn btn-primary">Add Studio</button>
						<span id="success" class="alert"></span>
				</div>
			</div>
		</div>
	</div> <!-- end row -->

</div> <!-- end container -->

	
	<script>
		// CREATE studio
		document.querySelector('#addStudioButton').addEventListener('click', () => {
			let name = document.querySelector('#name').value
			let desc = document.querySelector('#desc').value
			let price = document.querySelector('#price').value
			let seats = document.querySelector('#seats').value

		
	
					let formData = new FormData();

					formData.name = name
					formData.description = desc
					formData.price = price
					formData.seats = seats

					fetch('http://localhost:3000/studio/create', {
						method : "POST",
						headers : {
							'Content-Type' : 'application/json'
						},
						body: JSON.stringify(formData)
					}).then(res => res.json())
					.then(res => {


					})
					window.location = ('/admin_studios');





})








	</script>

@endsection