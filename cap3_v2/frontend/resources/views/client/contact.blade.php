
@extends('layout.app')

@section('title', 'Cherry Studio')

@section('content')

<!-- jumbotron -->
<div class="container-fluid p-0">
	<div class="jumbotron jumbotron-fluid jumbo-land">
	  <div class="container">
	    <h1 class="display-4 text-light">Hello! Don't be afraid to talk to us!</h1>
	    <p class="lead">Book a studio now!</p>
	  </div>
	</div>
</div><!--  end container -->

<!-- explore -->
	<!-- start content -->
		<div class="container-fluid">
            <div class="row" id="products">
                <div class="offset-md-1 col-md-10 col-12 border">
                    <div class="row">
                        <div class="col-md-6 border col-12">
                            <h3>We like to create music.Feel free to say hello!</h3>
                            <div class="form-group">
                                    <label for="name">Name: </label>
                                    <input type="text" id="name" class="form-control" name="name" placeholder="Your Name">
                                    <label for="email">Email: </label>
                                    <input type="email" id="email" class="form-control" name="email" placeholder=" Email">
                                    <label for="message">Message: </label>
                                    <input type="text" id="message" class="form-control" name="message" placeholder="Message">
                                </div>
                            <button id="addContactButton" class="btn btn-primary">Submit</button>
                        </div>
                    </div> <!-- end row -->
                    <div class="row">
                        <div class="col-md-10">
                            <table class="table table-striped table-responsive">
                                <thead>
                                    <tr>
                                        <th scope="col">Name: </th>
                                        <th scope="col">Email: </th>
                                        <th scope="col">Message: </th>
                                    </tr>
                                </thead>
                                <tbody id="contact"></tbody>
                            </table>
                            
                        </div>
                    </div>
                </div>
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

<script>
// CREATE studio
        document.querySelector('#addContactButton').addEventListener('click', () => {
            // alert('hit')
            let name = document.querySelector('#name').value
            let email = document.querySelector('#email').value
            let message = document.querySelector('#message').value

            let formData = new FormData();

            formData.name = name
            formData.email = email
            formData.message = message

            fetch('http://localhost:3000/contact/create', {
                method : "POST",
                headers : {
                    'Content-Type' : 'application/json'
                },
                body: JSON.stringify(formData)
            }).then(res => res.json())
            .then(res => {
                console.log(res)
            })
            window.location = ('/contact');
    })


    
</script>





<div>extend a footer here</div>














@endsection