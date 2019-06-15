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
							<label for="name">Name: </label>
							<input type="text" id="name" class="form-control" name="name" placeholder="Studio Name">
							<label for="desc">Description: </label>
							<input type="text" id="desc" class="form-control" name="desc" placeholder=" Description">
							<label for="price">Price: </label>
							<input type="number" id="price" class="form-control" name="price" placeholder=" Price">
						</div>
						<button id="" class="btn btn-primary">Back</button>
						<button id="addStudioButton" class="btn btn-primary">Add Studio</button>
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

			let formData = new FormData();

			formData.name = name
			formData.description = desc
			formData.price = price

			fetch('http://localhost:3000/studio/create', {
				method : "POST",
				headers : {
					'Content-Type' : 'application/json'
				},
				body: JSON.stringify(formData)
			}).then(res => res.json())
			.then(res => {
				console.log(res)
			})
			window.location = ('/admin_studios');
	})


	</script>

@endsection