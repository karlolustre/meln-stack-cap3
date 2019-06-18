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
				<div class="col-md-12 col-12">
					<h3 class="text-center m-2">Studios</h3>
					<div id="success" class="alert-success"></div>
						<table class="table table-striped">
		       				<thead>
					            <tr>
					                <th scope="col">Name</th>
					                <th scope="col">Description</th>
					                <th scope="col">Price</th>
					                <th scope="col">Qty</th>
					                <th scope="col">Status</th>
					                <th scope="col"></th>
					                <th scope="col"></th>
					            </tr>
					        </thead>
					        <tbody id="studioList"></tbody>
					    </table>	
					<button id="addStudioButton" class="btn btn-primary m-2">Add Studio</button>
				</div>
			</div> <!-- end nested row -->
		</div>
	</div> <!-- end row -->

	



	<!-- edit modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="editStudioModal">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		        <h5 class="text-center mt-3">Edit Studio Details</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		   
		      <div class="modal-body">
		        <p>Please fill in the required fields</p>
		        <form action="" id="editStudio">
				
		        </form>
		      </div>
		    </div>
		  </div>
		</div> <!-- end new song modal -->

</div> <!-- end container -->

	
	<script>
		// redirect to add studio 
		document.querySelector('#addStudioButton').addEventListener('click', () => {
			window.location = ('/admin_studios_create');

		})

		//retrieve studioList
		fetch('http://localhost:3000/studio', {
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
			const studio = data.data.studio
			
			let studioList = ' ';

			studio.map(studio => {
				console.log(studio)
				studioList += `
					
					<tr>
	                    <td>${studio.name}</td>
	                    <td>${studio.description}</td>
	                    <td>${studio.price}</td>
	                    <td>${studio.seats}</td>
	                    <td>${studio.isActive}</td>
					    <td><a href="#" id="editButton" class="btn btn-primary" data-toggle="modal" data-target="#editStudioModal" data-id="${studio._id}">Edit</a>
					    </td>
					    <td><button id="deleteButton" class="btn btn-danger" data-id="${studio._id}">Delete</button>
					    </td

                	</tr>
					
				`				
			})
			document.querySelector('#studioList').innerHTML = studioList

		})

		// UPDATE studio
		// retrieve single studio to update
		document.querySelector('#studioList').addEventListener('click', (e) => {
			// console.log(e.target.id)

			if (e.target.id === 'editButton') {

				let editId = e.target.dataset.id
				// console.log(editId)

				// window.location = ('/admin_studio_edit' +editId);

				fetch('http://localhost:3000/studio/' +editId)
					.then(res => {
						return res.json()
					})
					.then(data => {
						// console.log(data)
						const studio = data.data.studio
						// console.log(studio)
						let studioDetails = '';

						studioDetails += `

							{{ csrf_field() }}
							
							<form>
								<input type="hidden" data-id=${studio._id} id="editId"> 
								<label for="editName">Name :</label>
								<input id="editName" type="text" data-id="${studio._id}" class="form-control" name="name" value="${studio.name}" required>
								<label for="editDescription">Description :</label>
								<input id="editDescription" type="text" data-id="${studio._id}"  class="form-control" name="description" value="${studio.description}">
								<label for="editPrice">Price :</label>
								<input id="editPrice" type="number" data-id="${studio._id}"" id="price" class="form-control" name="price" value="${studio.price}">
								<button id="editSub" class="editSubmitButt btn btn-primary btn-block mt-3" data-dismiss="modal">Save</button>
							</form>
						`
						document.querySelector('#editStudio').innerHTML = studioDetails
					})
			}
		})

		document.querySelector('#editStudio').addEventListener('click', e => {
			// console.log(e.target.id)
			if(e.target.id === 'editSub'){
				let name = document.querySelector('#editName').value;
				let description = document.querySelector('#editDescription').value;
				let price = document.querySelector('#editPrice').value;

				// console.log(name)
				// console.log(description)
				// console.log(price)

				let formData = new FormData()

				formData.name = name;
				formData.description = description;
				formData.price = price;

				let editId = document.querySelector('#editId').dataset.id
				// console.log(editId)
				// console.log(formData)

				fetch('http://localhost:3000/studio/edit/' +editId, {
					method: "PUT",
					headers : {
						'Content-Type' : 'application/json'
					},
					body : JSON.stringify(formData)
				})
				.then(res=> {
					// console.log(res)
					document.querySelector('#success').classList.add("alert-success")

					document.querySelector('#success').innerHTML = "Successfully edited"
					// window.location= '/admin_studios'
				})
			}

		})





		//DELETE Studio
		document.querySelector('#studioList').addEventListener('click', (e) => {
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
		fetch('http://localhost:3000/studio/delete', {
					method: "DELETE",
					headers : {
						'Content-Type' : 'application/json'
					},
					body : JSON.stringify({id})
				})

				window.location= '/admin_studios'
		}






	</script>

@endsection