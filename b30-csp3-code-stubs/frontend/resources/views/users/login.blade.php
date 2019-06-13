@extends('layouts.app')

@section('title')
Log-in
@endsection

@section('content')
    {{--
        Show a form with the following input fields
        - email
        - password
        - a login button that will send a POST request via fetch to our login endpoint 
        - a register button that will redirect to /users/register 
  --}}  

    <script>
        //create a function that will get the form data, convert it to json, and send it in the body of a fetch POST request to the login endpoint

        //once a response is received from the API, store the following in localStorage:
            //javascript web token
            //user id
            //user email
            //the isAdmin property of the user object

        //if the logged in user is an admin, redirect to admin dashboard
        //if the logged in user is not an admin, redirect to catalogue
        
    </script>
@endsection