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
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">

    <!-- external css -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    
</head>

<body>
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark shadow-lg nav-color">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/home') }}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item ml-5">
                        <a class="nav-link" href="#">About</a>
                    </li>
                     <li class="nav-item ml-5">
                        <a class="nav-link" href="{{ url('/studio') }}">Studio</a>
                    </li>
                    <li class="nav-item ml-5">
                        <a class="nav-link" href="#">Clients</a>
                    </li>
                    <li class="nav-item ml-5">
                        <a class="nav-link" href="{{ url('/contact') }}">Contact Us</a>
                    </li>
                </ul>

                <!-- right nav links -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown ml-5">
                        <a class="nav-link dropdown-toggle" href="{{ url('/studio') }}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        User Management
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="">User Account</a>
                        <div class="dropdown-divider"></div>
                            <a id="logoutButton" class="dropdown-item" href="#">Logout</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/login') }}" class="nav-link">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/register') }}" class="nav-link">Register</a>
                    </li>
                     <li class="nav-item">
                        <a href="{{ url('/transactions/{id}') }}" class="nav-link">My Bookings</a>
                    </li>
                </ul>
                

            </div>
        </nav>

        <main>
            @yield('content')
        </main>
    </div>

    <script>
                document.querySelector('#logoutButton').addEventListener('click', () => {
                // alert('hit');
                if (window.confirm('Are you sure you want to logout?')) {
                 fetch('http://localhost:3000/auth/logout')
                 .then((res) => { 
                     return res.json();
                 })
                 .then((data) => {
                     localStorage.clear()
                     window.location.replace('/home')
                 })
                 .catch(function(err) {
                     console.log(err)
                 })

                }
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
