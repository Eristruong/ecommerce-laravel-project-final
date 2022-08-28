<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{ asset('public/frontend/dangky/images/icons/favicon.ico') }}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/dangky/vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/dangky/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/dangky/fonts/iconic/css/material-design-iconic-font.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/dangky/vendor/animate/animate.css') }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/dangky/vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/dangky/vendor/animsition/css/animsition.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/dangky/vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/dangky/vendor/daterangepicker/daterangepicker.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/dangky/css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/dangky/css/main.css') }}">
<!--===============================================================================================-->
<!--===============================================================================================-->
    <script src="{{ asset('public/frontend/dangky/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('public/frontend/dangky/vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('public/frontend/dangky/vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('public/frontend/dangky/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('public/frontend/dangky/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('public/frontend/dangky/vendor/daterangepicker/moment.min.js') }}"></script>
	<script src="{{ asset('public/frontend/dangky/vendor/daterangepicker/daterangepicker.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('public/frontend/dangky/vendor/countdowntime/countdowntime.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('public/frontend/dangky/js/main.js') }}"></script>

</head>
<body>
	

   
         
                        
          <main class="py-4">
            @yield('content')
        </main>   
                
               
    

	
	

</body>
</html>