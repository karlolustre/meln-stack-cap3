@extends('layouts.main')

@section('content')

			<div class="container">
				<div class="row">
					<div class="col-md-6 col-12 mx-auto border p-5">
				        <p class="text-center">Create an Account</p>
				        <form action="" id="newRegister">
				        	@csrf
				        	<div class="form-group">
					        	<label for="email">Email: </label>
					        	<input type="text" id="email" class="form-control" name="email" placeholder="sample@email.com">
				        	</div>
				        	<div class="form-group">
					        	<label for="password">Password: </label>
					        	<input type="password" id="password" class="form-control" name="password">
				        	</div>

				        	<button id="regButton" class="btn btn-success btn-block" data-dismiss="modal">Create</button>
				        </form>	
					</div>
				</div>
			</div>


@endsection