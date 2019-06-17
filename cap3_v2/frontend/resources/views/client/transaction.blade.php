@extends('layout.app')

@section('title', 'Cherry Studio')

@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <table class="table table-striped table-responsive">
                    <thead>
                        <tr>
                            <th scope="col">Date</th>
                            <th scope="col">Transaction ID</th>
                            <th scope="col">Availability ID</th>
                            <th scope="col">Seats Booked</th>
                            <th scope="col">Total Amount</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody id="transactions"></tbody>
                </table>   
        </div>
    </div>
</div>
    
    

@endsection