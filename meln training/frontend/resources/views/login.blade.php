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
		<!-- login  -->
		<div class="container">
			<div class="row mt-5">
				<div class="mx-auto col-md-6 col-12 border">
			      <div class="modal-body">
			       		<p class="text-center">LOGIN</p>
				        <div id="newRegister">
				        	<div class="form-group">
					        	<label for="email">Email: </label>
					        	<input type="text" id="email" class="form-control" name="email" placeholder="sample@email.com">
				        	</div>
				        	<div class="form-group">
					        	<label for="password">Password: </label>
					        	<input type="password" id="password" class="form-control" name="password">
				        	</div>

				        	<button id="loginButton" class="btn btn-success btn-block" data-dismiss="modal">login</button>
							<div>
							<h5 class="">Not a member yet?</h5>
				        	<a class="" href="{{ url('register') }}">Create an account</a>
							</div>
				        </div>
					</div>
				</div>
			</div> <!-- end row -->
		</div>

		<script>
			document.querySelector('#loginButton').addEventListener('click', () => {
				// alert('HIT')
				// console.log('HIT')
				let email = document.querySelector('#email').value;
				let pass = document.querySelector('#password').value;

				// console.log(email)
				// console.log(pass)

				fetch('http://localhost:3000/auth/login', {
					method: "POST", 
					headers : {
						'Content-Type' : 'application/json'
					},
					body: JSON.stringify({
						email : email,
						password : pass
					})
				})
				.then(res => res.json())
				.then(res => {
					// console.log(res)
					// console.log(res.data.token)
					// console.log(res.data.user.admin)
					// console.log(res.data.user.email)

					//read up on localStorage
					//setItem method
					localStorage.setItem('token', res.data.token)
					//store an item in our localStorage with a key user with a value of logged in users
					localStorage.setItem('user', res.data.user.email)
					localStorage.setItem('isAdmin', res.data.user.admin)

					window.location = '/'
					

				})
				.catch(error => console.error('Error: ', error))

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
