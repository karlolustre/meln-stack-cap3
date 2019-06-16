<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->

    <title>Cherry Studios | @yield('title')</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- fontawesome -->

    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">

    <!-- external css -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    
</head>


<body>

	<div class="container">
		<div class="row">
			<div class="mx-auto col-md-6 col-12 border mt-5">
		      <div class="modal-body">
		       		<p class="text-center">LOGIN</p>
			        <div id="newRegister">
			        	<div class="form-group">
				        	<label for="email">Email: </label>
				        	<input type="text" id="email" class="form-control" name="email">
			        	</div>
			        	<div class="form-group">
				        	<label for="password">Password: </label>
				        	<input type="password" id="password" class="form-control" name="password">
			        	</div>

			        	<button id="loginButton" class="btn btn-success btn-block" data-dismiss="modal">login</button>
						<div class="mt-2">
							<span class="">Not a member yet?</span>
			        		<a class="" href="{{ url('register') }}">Create an account</a>
						</div>
						<div>
	        				<a href="/home">Go Home</a>
	       				</div>
			        </div>
				</div>
			</div>
		</div> <!-- end row -->
	</div> <!-- end container -->

	<script>
		document.querySelector('#loginButton').addEventListener('click', () => {
			
			let email = document.querySelector('#email').value
			let password = document.querySelector('#password').value

			// console.log(email)
			// console.log(password)

			fetch('http://localhost:3000/auth/login', {
				method : "POST",
				headers : {
					'Content-Type' : 'application/json'
				},
				body: JSON.stringify({
					email : email,
					password : password
				})
			})
			.then(res => res.json())
			.then(res => {
				// console.log(res)
				localStorage.setItem('token', res.data.token)
				//store with value of login
				localStorage.setItem('user', res.data.user.email)
				localStorage.setItem('isAdmin', res.data.user.admin)

				window.location = '/home'

			})
		})
	</script>

</body>

   <!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


</html>