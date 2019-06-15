<header class="container-fluid">
	<div class="d-flex bd-highlight">
  		<div class="p-2 bd-highlight align-self-center"><img class="cherry-size" src="http://www.myiconfinder.com/uploads/iconsets/256-256-4f10f0a44ac19c443d1f5b74184f15f5-cherry.png" alt=""> </div>
  		<div class="p-2 bd-highlight align-self-center"><h3 class="">Cherry Studios</h3></div>
  		<div class="ml-auto p-2 bd-highlight align-self-center">Flex item</div>
	</div>
</header>

@extends('layout.app')

@section('title', 'Home')

@section('content')

<!-- jumbotron -->
<div class="container-fluid p-0">
	<div class="jumbotron jumbotron-fluid jumbo-land">
	  <div class="container">
	    <h1 class="display-4">Fluid jumbotron</h1>
	    <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
	  </div>
	</div>
</div><!--  end container -->

<!-- expore -->
<section class="container">
	<h3>Explore Cherry Studios</h3>
	<div class="row">
		<div class="col-md-3 col-12 border">
			<p>card 1</p>
		</div>
		<div class="col-md-3 col-12 border">
			<p>card 2</p>
		</div>
		<div class="col-md-3 col-12 border">
			<p>card 3</p>
		</div>
		<div class="col-md-3 col-12 border">
			<p>card 4</p>
		</div>
	</div>
	<h1>image here</h1>
</section>

<div class="container">
	<h1>testimonials</h1>
	<h1>Contact us</h1>	
</div>

<div>extend a footer here</div>














@endsection