@extends('layouts.app')

@section('title')
My Transactions
@endsection

@section('content')

    {{--

        Show all the Transactions for this logged in user in table form with the following columns:
        - the transaction date
        - the transaction ID
        - the availability ID
        - the number of seats booked
        - the total amount paid
        - the transaction status (booked or cancelled)
        - an Actions column for the cancel button:
            -the cancel button will send a POST fetch request to the transactions/id URI that will add a new transaction reflecting a reversal of charges 
    
  --}}

    <script type="text/javascript">
        //get all transactions for this logged in user from the API endpoint by sending a GET fetch request to the /transactions/id URI
        //dynamically generate the contents for the transactions table from the transactions received as an API response 
        //the cancel button will send a POST request via fetch to the /transactions/id URI with a request body containing the status: cancelled
    </script>

        
            

            
        
@endsection