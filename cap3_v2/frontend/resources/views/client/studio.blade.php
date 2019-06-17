
@extends('layout.app')

@section('title', 'Cherry Studio')

@section('content')

<!-- jumbotron -->
<div class="container-fluid p-0">
	<div class="jumbotron jumbotron-fluid jumbo-land">
	  <div class="container">
	    <h1 class="display-4">Hello! Let's Create Music</h1>
	    <p class="lead">Book a studio now!</p>
	  </div>
	</div>
</div><!--  end container -->

<!-- explore -->
	<!-- start content -->
		<div class="container-fluid">
        <div class="row" id="products">
            
        </div>
    </div>


		<!-- view modal studio -->
		<div class="modal fade" tabindex="-1" role="dialog" id="editStudioModal">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title">Studio</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <!-- <p>Please fill in the required fields</p> -->
		        <form action="" id="editStudio">
				
		        </form>
		      </div>
		    </div>
		  </div>
		</div> <!-- end new song modal -->
</section>

	

	<!-- //retrieve studios -->
	<script type="text/javascript">
        fetch('http://localhost:3000/studio/').then(function(response) {
            return response.json();
        })
        .then(function(data) {
        	// console.log(data)
            let availabilities = data.data.studio;
            availabilities.forEach(function(availability) {
                document.getElementById("products").innerHTML += `
                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3" id="itemholder">
                        <div class="card">
                            <img class="card-img-top" src="http://lorempixel.com/400/200/sports" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title">${availability.name}</h4>
                                <p class="card-text">${availability.description}</p>
                                <p class="card-text">Available seats: ${availability.seats}</p>
                                <p class="card-text">Price per seat: PhP ${availability.price}</p>
                                <button class="btn btn-primary book-btn" id="${availability._id}">Book now!</button>
                                <div>
                            </div>
                        </div>
                    </div>
                `
                if(availability.isActive == false) {
                    document.getElementById(availability._id).disabled = true;
                    document.getElementById(availability._id).innerHTML = "Unavailable";
                } else {
                    document.getElementById(availability._id).disabled = false;
                }
            });

            //turn the book-btn class into an array
            let buttons = document.querySelectorAll('.book-btn');

            //loop through the buttons array to add an event listener and associate specific product id to each one
            buttons.forEach(function(button) {
                //add onclick event listener to every button
                button.addEventListener('click', function() {
                    let id = this.getAttribute('id')
                    if(localStorage.getItem('token')==null) {
                        window.location.replace("/login");
                    } else { 
                        window.location.replace(`/availability/${id}`);
                    }
                });
            })
        })
        .catch(function(err) {
            console.log(err);
        });
    </script>
		






<div>extend a footer here</div>














@endsection