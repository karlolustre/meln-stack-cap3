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
					console.log(song)
					songGroups += `
						<li class="card p-3 text-center">${song.title}
						</li>
					`
				})
				document.querySelector('#songList').innerHTML = songGroups;
			})


		

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
						</li>
					`
				})
				document.querySelector("#devList").innerHTML = devGroups;

			})


		</script>


        
    </body>
        <!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


</html>
