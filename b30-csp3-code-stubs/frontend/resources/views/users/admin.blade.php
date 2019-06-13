@extends('layouts.app')

@section('title')
Admin Dashboard
@endsection

@section('content')
    {{--
        Show a form for adding a new availability with the ff. input fields:
        -availability name
        -availability description
        -number of available seats
        -price per seat
        -a submit button that will POST the above form data as json to the availabilities URI 

        Show all the Availabilities in table form with the following columns:
        - the Availability ID
        - the Availability name
        - the Availability description
        - the number of seats available
        - the price per seat
        - isActive? true or false
        - an Actions column with 2 buttons:
            -an update button that will redirect to /availabilities/update/id
            -a toggled button that will either disable the availability if its isActive property is currently true or enable the availability if its isActive property is currently set to false
    
  --}}

    

    <script type="text/javascript">
        //get all availabilities from the API endpoint by sending a GET fetch request to the /availabilities/ URI
        //dynamically generate the contents for the availabilities table from the availabilities received as an API response 
        //the update buttons will redirect to /availabilities/update/id
        //the disable / enable button will send a PUT fetch request to the availabilities/id URI, with a json body containing the isActive property with a value that's either true or false
        //create a function that will get the form data from the add availability form, convert it to json, and send it in the body of a fetch POST request to the availabilities URI
        
    </script>

        
            

            
        
@endsection