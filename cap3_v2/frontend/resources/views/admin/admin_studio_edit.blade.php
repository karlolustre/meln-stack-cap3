@extends('layout.admin')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-2 border">
			@include('admin.admin_sideNav')			
		</div>
		<!-- end sidenav -->

		<!-- start content -->
		<div class="col-md-9 border">
			<div class="row">
				<p>Please fill in the required fields</p>
		        <form action="" id="editDev">
				
		        </form>
			</div>
		</div>
	</div> <!-- end row -->

</div> <!-- end container -->

	
	<script>
		// UPDATE studio
		console.log(editId)


	</script>

@endsection