<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
  	
	<title>@yield('title', 'MELN')</title>
</head>
<body>
{{--

	1. Create a Navbar with the ff. links AT A MINIMUM
      - Application/Brand Name with an href "/home"
      - A Dropdown list that has the ff. list items:
        @guest the user is a guest
          - home / catalogue
          - Login
          - Register
        @non-admin user
          - Home / catalogue
          - User transactions
        @Admin
          - Availabilities
          - Transactions
        @any user logged in
          - logout

  --}}

  {{-- 
    2. Add a yield for the main content
    
    START MAIN

    main
      @yield('content')
    footer

    END MAIN
  --}}

  {{-- 
    3. Add a yield for the JS scripts

    @yield('script')
  --}}

  {{-- 
    4. Add custom scripts here
  --}}

</body>
</html>