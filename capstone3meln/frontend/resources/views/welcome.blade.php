<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- bootstrap css -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
		

    </head>

	<body>
		<h1 class="m-5">Create a new dev</h1>

		<button class="btn btn-primary m-5" data-toggle="modal" data-target="#newDev">Create Dev</button>
		<span id="success" class="alert"></span>

		<button class="btn btn-success" data-toggle="modal" data-target="#newSong">New Song</button>
		<span id="success" class="alert"></span>


		<!-- create dev modal -->
		<div class="modal fade" tabindex="-1" role="dialog" id="newDev">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title">Create a new dev</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <p>Please fill in the required fields</p>
		        <form action="" id="createDev">
		        	@csrf
		        	<div class="form-group">
			        	<label for="name">Name: </label>
			        	<input type="text" id="name" class="form-control" name="name" placeholder="name">
		        	</div>
		        	<div class="form-group">
			        	<label for="portfolio">Portfolio: </label>
			        	<input type="text" id="portfolio" class="form-control" name="portfolio" placeholder="sample@sample.com">
		        	</div>
		        	<div class="form-group">
			        	<label for="batch">Batch Number: </label>
			        	<input type="text" id="batch" class="form-control" name="batch" placeholder="30">
		        	</div>

		        	<button id="createButton" class="btn btn-primary btn-block" data-dismiss="modal">Create</button>
		        </form>
		      </div>
		    </div>
		  </div>
		</div> <!-- end new dev modal -->

		<!-- new song modal -->
		<div class="modal fade" tabindex="-1" role="dialog" id="newSong">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title">Create a new Song</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <p>Please fill in the required fields</p>
		        <form action="" id="newSong">
		        	@csrf
		        	<div class="form-group">
			        	<label for="title">Title: </label>
			        	<input type="text" id="title" class="form-control" name="title" placeholder="title">
		        	</div>
		        	<div class="form-group">
			        	<label for="artist">Artist: </label>
			        	<input type="text" id="artist" class="form-control" name="artist" placeholder="artist name">
		        	</div>
		        	<div class="form-group">
			        	<label for="length">Length: </label>
			        	<input type="text" id="length" class="form-control" name="length" placeholder="length">
		        	</div>

		        	<button id="songCreate" class="btn btn-success btn-block" data-dismiss="modal">Create</button>
		        </form>
		      </div>
		    </div>
		  </div>
		</div> <!-- end new song modal -->

		<!-- edit modal -->
		<div class="modal fade" tabindex="-1" role="dialog" id="editDevModal">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title">Edit Dev</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <p>Please fill in the required fields</p>
		        <form action="" id="editDev">
				
		        </form>
		      </div>
		    </div>
		  </div>
		</div> <!-- end new song modal -->


		<!-- dev list -->
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<h1 class="text-center">Users</h1>
					<ul id="devList">
					</ul>
				</div>
			</div>
		</div>
		
		<!-- song list -->
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<h1 class="text-center">Songs</h1>
					<ul id="songList">
					</ul>
				</div>
			</div>
		</div>

			

		<!-- create new dev js -->
		<script>
			//create SONG
			document.querySelector('#songCreate').addEventListener("click", function(){
				let title = document.querySelector('#title').value;
				let artist = document.querySelector('#artist').value;
				let length = document.querySelector('#length').value;
				// console.log(title)
				// console.log(artist)
				// console.log(length)

				let formData = new FormData()

				formData.title = title
				formData.artist = artist
				formData.length = length

				fetch('http://localhost:3000/songs/new', {
					method: "POST",
					headers : {
						'Content-Type' : 'application/json'
					},
					body : JSON.stringify(formData)
				}).then(res=>res.json())
				.then(res => {
					// console.log(res)	
					// add the class alert-success to #success
					document.querySelector('#success').classList.add("alert-success")

					document.querySelector('#success').innerHTML = "Successfully created " + res.title
					//change the content of #success to print out "sucessfully created the dev (name of dev)"
					// document.querySelector('#success').innnerHTML = "Successfully created" + res.name
				})
				.catch(error => console.error('Error:', error))

			})

			const urlSongs = 'http://localhost:3000/songs/all'
			fetch(urlSongs, {
				method : 'GET',
				headers : {
					'Content-Type' : 'application/json'
				}
			})
			.then(res=> {
				return res.json()
			})
			.then(collection => {
				// console.log(collection.collection.songs)
				const songs = collection.collection.songs
				let songGroups = ' ';

				songs.map(song => {
					// console.log(song)
					songGroups += `
						<li class="card p-3 text-center">${song.title}
						<button class="deleteButton" id="deleteButton" data-id="${song._id}">Delete</button>
						<button class="editButton" id="editButton" data-id="${song._id}">Edit</button>
						</li>
					`
				})
				document.querySelector('#songList').innerHTML = songGroups;
			})

			//edit song 
			document.querySelector('#songList').addEventListener('click', e => {
				
			})


			//delete song
			document.querySelector('#songList').addEventListener('click', e => {
				if (e.target.className === 'deleteButton') {
					// console.log(e.target.dataset.id)
	
					if(!confirm ('are you sure?')){
						return false
					}

					// console.log(e.target.parentNode)
					e.target.parentNode.remove()
					removeSong(e.target.dataset.id)
				}
			})
			
			function removeSong(id) {
				// console.log(id)
				fetch('http://localhost:3000/songs/delete', {
					method: "DELETE",
					headers : {
						'Content-Type' : 'application/json'
					},
					body : JSON.stringify({id})
				})
			}




			// create DEV
			document.querySelector('#createButton').addEventListener("click", function(){
				// alert('hello')
				let namefield = document.querySelector('#name').value; 
				let portfolio = document.querySelector('#portfolio').value;
				let batch = document.querySelector('#batch').value;
				// console.log(namefield);
				// console.log(portfolio);
				// console.log(batch);

				let formData = new FormData()

				formData.name = namefield
				formData.portfolio = portfolio
				formData.batch = batch


				// console.log(formData)
				fetch('http://localhost:3000/devs/create', {
					method: "POST",
					headers : {
						'Content-Type' : 'application/json'
					},
					body : JSON.stringify(formData)
				}).then(res=>res.json())
				.then(res => {
					// console.log(res)	
					// add the class alert-success to #success
					document.querySelector('#success').classList.add("alert-success")

					document.querySelector('#success').innerHTML = "Successfully created " + res.name
					//change the content of #success to print out "sucessfully created the dev (name of dev)"
					// document.querySelector('#success').innnerHTML = "Successfully created" + res.name
				})
				.catch(error => console.error('Error:', error))

			}) 

			//retrieve DEV 
			// document.querySelector('#devList').innerHTML= 'hello world';
			const url = 'http://localhost:3000/devs/'
			fetch(url, {
				method : 'GET',
				headers : {
					'Content-Type' : 'application/json'
				}
			})
			.then(res=> {
				return res.json()
			})
			.then(data => {
				// console.log(data.data.devs)
				const devs = data.data.devs
				let devGroups = ' ';

				devs.map(dev => {
					// console.log(dev)
					devGroups += `
						<li class="card p-3 text-center">${dev.name}
						<button class="deleteButton" id="deleteButton" data-id="${dev._id}">Delete</button>
						<button class="editButton" data-toggle="modal" data-target="#editDevModal" id="editButton" data-id="${dev._id}">Edit</button>
						</li>
					`
				})
				document.querySelector("#devList").innerHTML = devGroups;

			})

			//edit a dev
			//receive the specific dev details for the modal
			document.querySelector('#devList').addEventListener('click', e => {
				if(e.target.className === 'editButton') {
					// console.log('this is the id: ' + e.target.dataset.id)
					let editId = e.target.dataset.id

					fetch('http://localhost:3000/devs/' +editId)
					.then(res => {
						return res.json()
					})
					.then(data => {
						// console.log(data.data.dev)
						const dev = data.data.dev
						// console.log(dev)

						let devDetails = ' ';

						devDetails += `
							{{ csrf_field() }}
							
							<input id="editId" type="hidden" data-id="${dev._id}  class="form-control" name="id" placeholder="title">
							<input id="editName" type="text" data-id="${dev._id}"" id="title" class="form-control" name="name" placeholder="${dev.name}">
							<input id="editPortfolio" type="text" data-id="${dev._id}""  class="form-control" name="portfolio" placeholder="${dev.portfolio}">
							<input id="editBatch" type="number" data-id="${dev._id}"" id="title" class="form-control" name="batch" placeholder="${dev.batch}">
							<button id="" class="editSub" data-dismiss="modal">Submit</button>
						`
						document.querySelector('#editDev').innerHTML = devDetails
					})


				}
			})

			document.querySelector("#editDev").addEventListener("click", e => {
				if(e.target.className === "editSub") {
					let name = document.querySelector('#editName').value
					// console.log(name)
					let portfolio = document.querySelector('#editPortfolio').value
					// console.log(portfolio)
					let batch = document.querySelector('#editBatch').value
					// console.log(batch)

					let formData = new FormData()

					formData.name = name
					formData.portfolio = portfolio
					formData.batch = batch

					// console.log(formData)\
					let editId = document.querySelector('#editId').dataset.id
					// console.log(editId)


					// console.log(e.target.parentNode.firstElementChild.nextElementSibling.dataset.id)

					fetch('http://localhost:3000/devs/'+editId, {
						method : "PUT",
						headers : {
							'Content-Type' : 'application/json'
						},
						body : JSON.stringify(formData)
					})
					
				}
			})



			//delete Dev
			document.querySelector('#devList').addEventListener('click', e => {
				if (e.target.className === 'deleteButton') {
					// console.log(e.target.dataset.id)
	
					if(!confirm ('are you sure?')){
						return false
					}

					// let element = e.target.dataset.id
					// console.log(e.target.parentNode)
					e.target.parentNode.remove()
					removeDev(e.target.dataset.id)
				}
			})

			function removeDev(id) {
				// console.log(id)
				fetch('http://localhost:3000/devs/delete', {
					method: "DELETE",
					headers : {
						'Content-Type' : 'application/json'
					},
					body : JSON.stringify({id})
				})
			}


		</script>


        
    </body>
        <!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


</html>
