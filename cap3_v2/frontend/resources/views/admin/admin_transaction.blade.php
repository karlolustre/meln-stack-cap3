@extends('layout.admin')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-2 border">
			@include('admin.admin_sideNav')			
		</div>
		<!-- end sidenav -->
		<div class="col-md-9 col-12">
		<table class="table table-striped table-responsive">
	        <thead>
	            <tr>
	                <th scope="col">Date</th>
	                <th scope="col">Transaction ID</th>
	                <th scope="col">Email</th>
	                <th scope="col">Availability ID</th>
	                <th scope="col">Total Amount</th>
	                <th scope="col">Status</th>
	            </tr>
	        </thead>
	        <tbody id="transactions"></tbody>
	    </table>
		</div>
	</div>
</div>

    <script type="text/javascript">
        fetch('http://localhost:3000/transactions/all', {
            method: "GET",
            headers: {
                "Content-Type" : "application/json",
                "Authorization" : "Bearer " + localStorage.getItem('token')
            }
        })
        .then(function(response) {
            return response.json();
        })
        .then(function(data) {
            let transactions = data.data.transactions;
            transactions.forEach(function(transaction) {
                document.getElementById("transactions").innerHTML += `
                <tr>
                    <th scope="row">${transaction.date}</th>
                    <td>${transaction._id}</td>
                    <td>${transaction.ownerEmail}</td>
                    <td>${transaction.availabilityId}</td>
                    <td>${transaction.amount}</td>
                    <td>${transaction.status}</td>
                </tr>
                ` 
            });
        })
        .catch(function(err) {
            console.log(err);
        });
    </script>



@endsection