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
		<div class="col-md-6 col-12 mx-auto border p-5 mt-5">
	        <p class="text-center">Create an Account</p>
	        <form action="" id="newRegister">
	        	@csrf
	        	<div class="form-group">
		        	<label for="email">Email: </label>
		        	<input type="text" id="email" class="form-control" name="email" placeholder="sample@email.com">
	        	</div>
	        	<div class="form-group">
		        	<label for="password">Password: </label>
		        	<input type="password" id="password" class="form-control" name="password">
	        	</div>

	        	<button id="regButton" class="btn btn-success btn-block" >Register</button>
	        </form>	
	        <div class="mt-2">
	        	<span class="">Already a member?</span>
	        	<a href="/login">login</a>
	        </div>
	        <div>
	        	<a href="/home">Go Home</a>
	        </div>
		</div>
	</div>
</div>

<script>
	//register a user
	document.querySelector('#regButton').addEventListener('click', () => {
		let email = document.querySelector('#email').value
		let password = document.querySelector('#password').value

		let formData = new FormData()

		formData.email = email
		formData.password = password

		fetch('http://localhost:3000/register', {
			method : "POST",
			headers : {
				'Content-Type' : 'application/json'
			},
			body: JSON.stringify(formData)
		}).then(res => res.json())
		.then(data => {
			window.location = ('/home');
		})
		.catch(error => console.error('Error:', error))



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