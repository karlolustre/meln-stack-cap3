@extends('layouts.app')

@section('title')
Update Availability
@endsection

@section('content')
    {{--
        Show a form for updating an availability with the ff. input fields:
        -availability name
        -availability description
        -number of available seats
        -price per seat
        -an update button that will PUT the above form data as json to the availabilities/id URI 

  --}}

    

    <script type="text/javascript">
        //send a GET request to the availabilities/id URI to retrieve availability details
        //fill in the input forms with the retrieved information 
        //create a function that will get the form data from the update availability form, convert it to json, and send it in the body of a fetch PUT request to the availabilities/id URI
        
    </script>
    

@endsection