<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cherry Studios</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
        <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">

        {{-- bootstrap css --}}
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">

    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12 border text-light ">
                    <h1 class="text-center">Cherry Studios</h1>
                    <div class="row">
                        <div class="col-md-4 col-12">
                        </div>
                    </div>
                    <button type="submt" class="btn btn-warning">Book now</button>
                    <a href="{{ url('/home') }}" class="btn btn-warning text-dark">Home</a>
                </div>
            </div> 
        </div>
        
    </body>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</html>