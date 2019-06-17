@extends('layout.app')

@section('title', 'Cherry Studio')

@section('content')

<div class="container-fluid">
        <div class="page-header">
            <h2 id="productName"></h2>
        </div>
        <p id="description"></p>
        <p id="seats"></p>
        <p id="price"></p>

        <form id="buy">

            <div class="form-group">
                <label for="date">Calendar</label>
                <input type="date" name="date" id="date">
            </div>

            <div class="form-group">
                <button type="button" class="btn btn-primary" onclick="book()">Book now</button>
            </div>
        </form>
    </div>

    <script type="text/javascript">
        
        //send a GET request using the availability ID as a wildcard to view specific product details
        fetch('http://localhost:3000/studio/{{$id}}')
        .then(function(response) {
            return response.json();
        })
        .then(function(data) {
            //dynamically fill in product info from API's response
            console.log(data)
            document.getElementById("name").innerHTML = data.data.studio.name;
            document.getElementById("description").innerHTML = data.data.studio.description;
            document.getElementById("price").innerHTML = data.data.studio.price;
        })
       .catch(function(err) {
            console.log(err);
        });

       function book() {
            //get quantity from form
            const formElement = document.getElementById('buy');
            const formData = new FormData(formElement);
            let jsonObject = {};
            for (const [key, value] of formData.entries()) {
                jsonObject[key] = value;
            };
            //add ID of chosen booking to jsonObject
            jsonObject.id = "{{$id}}";
            //add user email to jsonObject
            jsonObject.email = localStorage.getItem('user');
            console.log(JSON.stringify(jsonObject));

            //store all headers into a single variable
            let reqHeader = new Headers();
            reqHeader.append('Access-Control-Request-Headers', 'Content-Type, Access-Control-Request-Method, X-Requested-With, Authorization');
            reqHeader.append('Content-Type', 'application/json');
            reqHeader.append('Access-Control-Request-Method', 'POST');
            reqHeader.append('X-Requested-With', 'XMLHttpRequest');
            reqHeader.append('Authorization', 'Bearer ' + localStorage.getItem('token'));

            //create optional init object for supplying options to the fetch request
            let initObject = {
                method: 'POST', headers: reqHeader, body: JSON.stringify(jsonObject),
            };

            //create a resource request object through the Request() constructor
            let clientReq = new Request('http://localhost:3000/transactions/', initObject);

            //use above request object as the argument for our fetch request
            fetch(clientReq).then(function(response) {
                return response.json();
            })
            .then(function(response) {
                console.log(response);
            })
            .catch(function(err) {
                console.log("Something went wrong!", err);
            });

       };
    </script>

    

    

@endsection