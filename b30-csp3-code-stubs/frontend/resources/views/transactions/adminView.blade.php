@extends('layouts.app')

@section('title')
Transactions History
@endsection

@section('content')
    {{--

        Show a historical view of all the Transactions in table form with the following columns:
        - the transaction date
        - the transaction ID
        - the user email
        - the availability ID
        - the number of seats booked
        - the total amount paid
        - the transaction status (booked or cancelled)
    
  --}}

    <script type="text/javascript">
        //get all transactions from the API endpoint by sending a GET fetch request to the transactions/all URI
        //dynamically generate the contents for the transactions table from the transactions received as an API response 
    </script>

        
            

            
        
@endsection