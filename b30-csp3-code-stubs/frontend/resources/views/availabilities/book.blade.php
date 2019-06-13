@extends('layouts.app')

@section('title')
View Class


@endsection

@section('content')

    {{--
        Show a view for booking an availability with the ff. information:
        -availability name
        -availability description
        -number of available seats
        -price per seat
        -a form input for indicating booking quantity
        -a book button that will POST the above form data as json to the availabilities URI 
            -this will create a new transaction

  --}}

    

    <script type="text/javascript">
        //send a GET request to the availabilities/id URI to retrieve availability details
        //create a function that will get the form data from the book availability form, convert it to json, and send it in the body of a fetch POST request to the availabilities URI
        
    </script>
    
@endsection