
@extends('layout.app')

@section('title', 'Cherry Studio')

@section('content')

<!-- jumbotron -->
<div class="container-fluid p-0">
	<div class="jumbotron jumbotron-fluid jumbo-land">
	  <div class="container">
	    <h1 class="display-4">Hello! Let's Create Music</h1>
	    <p class="lead">Book a studio now!</p>
	  </div>
	</div>
</div><!--  end container -->

<!-- explore -->
<section class="container">
	<!-- start content -->
		<div class="col-md-9 border">
			<div class="row">
				<div class="col-md-12 border">
					<p class="text-center">Studio</p>
					<ul id="studioList">
						
					</ul>
					
				</div>
			</div> <!-- end nested row -->
		</div>

		<!-- view modal studio -->
		<div class="modal fade" tabindex="-1" role="dialog" id="editStudioModal">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title">Studio</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <!-- <p>Please fill in the required fields</p> -->
		        <form action="" id="editStudio">
				
		        </form>
		      </div>
		    </div>
		  </div>
		</div> <!-- end new song modal -->
</section>

<script> 
	

	//retrieve studios
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
				// console.log(studio)
				studioList += `
					<div class="card">
					  <div class="card-body">
					    <h5 class="card-title">${studio.name}</h5>
					    <h6 class="card-subtitle mb-2 text-muted">Price : ${studio.price}</h6>
					    <p class="card-text">${studio.description}</p>
					    <a href="#" id="editButton" class="btn btn-primary" data-toggle="modal" data-target="#editStudioModal" data-id="${studio._id}">View Studio</a>
					    <a href="#" id="selectStudio" class="btn btn-success" data-id="${studio._id}">Select Studio</a>
					  </div>
					</div>
					
				`				
			})
			document.querySelector('#studioList').innerHTML = studioList

		})

		// retrieve single studio to view
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
							<input type="hidden" data-id=${studio._id} id="editId"> 
							<div class="card mb-2">
							  <div class="card-body">
							    <h5 class="card-title">${studio.name}</h5>
							    <h6 class="card-subtitle mb-2 text-muted">Price : ${studio.price}</h6>
							    <p class="card-text">${studio.description}</p>
							  </div>
							</div>
							
						
							<button id="selectStudio2" class="btn btn-success btn-block" data-dismiss="modal">Select Studio</button>
						`
						document.querySelector('#editStudio').innerHTML = studioDetails
					})
			} 
			// if (e.target.id === 'selectStudio') {
			// 	let availId = e.target.dataset.id

			// 	window.location = ('/availability' +availId)

			// }

		})

		

</script>





<div>extend a footer here</div>














@endsection