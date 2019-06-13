@extends('layouts.app')

@section('title')
MELN Home
@endsection

@section('content')
    {{--
        Show all the Availabilities in the form of Bootstrap Cards 
      @for each availability
        - Show the Availability Name
        - Show the Availability Description
        - Show the number of seats available
        - Show the price per seat
        - Show a booking button that will:
            -ask you to login or register if you haven't done so already
            -if logged in, the book button will redirect to /availabilities/id
    
  --}}

    <script type="text/javascript">
        //get all availabilities from the API endpoint by sending a GET fetch request to the /availabilities/ URI
        //dynamically generate the catalogue view from the availabilities received as an API response 
    </script>

        
            

            
        
@endsection