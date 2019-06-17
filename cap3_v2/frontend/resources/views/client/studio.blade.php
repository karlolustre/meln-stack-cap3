
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
				let itemId = studio._id
				console.log(itemId)

				studioList += `
					<div class="card">
					  <div class="card-body">
					    <h5 class="card-title">${studio.name}</h5>
					    <h6 class="card-subtitle mb-2 text-muted">Price : ${studio.price}</h6>
					    <p class="card-text">Description: ${studio.description}</p>
					    <p class="card-text">Seats: ${studio.seats}</p>
					    <a href="#" id="editButton" class="btn btn-primary" data-toggle="modal" data-target="#editStudioModal" data-id="${studio._id}">View Studio</a>
					    <form action="/availability/${itemId} method="GET">
					    {{ csrf_field() }}
					    <input type="hidden" id="hiddenInput" data-id="${itemId}"></input>
					    <button type="submit" id="selectStudio" class="btn btn-success" data-id="${studio._id}">Book Now</button>
						</form>
					  </div>
					</div>
					
				`				
			})

			document.querySelector('#studioList').innerHTML = studioList

			// if(studio.isActive == false) {
   //                  document.getElementById(studio._id).disabled = true;
   //                  document.getElementById(studio._id).innerHTML = "Unavailable";
   //              } else {
   //                  document.getElementById(studio._id).disabled = false;
   //              }
			})
			

		// retrieve single studio to view
		// document.querySelector('#studioList').addEventListener('click', (e) => {
		// 	// console.log(e.target.id)

		// 	if (e.target.id === 'selectStudio') {
		// 		// console.log('hit')
		// 		let id = e.target.dataset.id
		// 		// console.log(editId)
			
		// 		// window.location = ('/admin_studio_edit' +editId);

		// 		  if(localStorage.getItem('token')==null) {
  //                       window.location.replace("/login");
  //                   } else { 
  //                       window.location.replace(`/availabilities/${id}`);
  //                   }
			// if (e.target.id === 'selectStudio') {
			// 	let availId = e.target.dataset.id

			// 	window.location = ('/availability' +availId)

			// }

		// })

		

</script>





<div>extend a footer here</div>














@endsection