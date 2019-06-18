<header class="container-fluid">
	<div class="d-flex bd-highlight">
  		<div class="p-2 bd-highlight align-self-center"><img class="cherry-size" src="http://www.myiconfinder.com/uploads/iconsets/256-256-4f10f0a44ac19c443d1f5b74184f15f5-cherry.png" alt=""> </div>
  		<div class="p-2 bd-highlight align-self-center"><h3 class="">Cherry Studios</h3></div>
  		<a class="ml-auto p-2 bd-highlight align-self-center btn btn-outline-success" href="{{ url('/studio') }}">Book Now</a>
	</div>
</header>

@extends('layout.app')

@section('title', 'Home')

@section('content')

<!-- jumbotron -->
<div class="container-fluid p-0">
	<div class="jumbo-land">
	    <a href="{{ url('./studio') }}" class="btn btn-color">Book Now</a>
	  </div>
</div><!--  end container -->

<!-- explore -->
<section class="container">
	<h3 class="mt-5">Explore Cherry Studios</h3>
	<div class="row">
		<div class="col-md-4 col-12 card-deco">
			<div class="box-part text-center">                      
                <i class="fa fa-instagram fa-3x" aria-hidden="true"></i>                       
				<div class="title">
					<h4>About</h4>
				</div>                       
				<div class="text">
					<span>Lorem ipsum dolor sit amet, id quo eruditi eloquentiam. Assum decore te sed. Elitr scripta ocurreret qui ad.</span>
				</div>                       
				<a class="card-link" href="#">Learn More</a>              
			 </div>
		 </div> <!-- end cols -->

		 <div class="col-md-4 col-12 card-deco">
			<div class="box-part text-center">                      
                <i class="fa fa-instagram fa-3x" aria-hidden="true"></i>                       
				<div class="title">
					<h4>Clients</h4>
				</div>                       
				<div class="text">
					<span>Lorem ipsum dolor sit amet, id quo eruditi eloquentiam. Assum decore te sed. Elitr scripta ocurreret qui ad.</span>
				</div>                       
				<a href="#">Learn More</a>              
			 </div>
		 </div> <!-- end cols -->

		 <div class="col-md-4 col-12 card-deco">
			<div class="box-part text-center">                      
                <i class="fa fa-instagram fa-3x" aria-hidden="true"></i>                       
				<div class="title">
					<h4>Contact Us</h4>
				</div>                       
				<div class="text">
					<span>Lorem ipsum dolor sit amet, id quo eruditi eloquentiam. Assum decore te sed. Elitr scripta ocurreret qui ad.</span>
				</div>                       
				<a href="#">Learn More</a>              
			 </div>
		 </div> <!-- end cols -->


</section>



<div>extend a footer here</div>














@endsection