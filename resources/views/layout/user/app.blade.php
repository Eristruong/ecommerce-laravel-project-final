<!DOCTYPE html>
<html lang="en">
<head>
	<title>Đăng Nhập</title>
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
 
	<style>
.form-controll.success input {
	border-color: #2ecc71;
}

.form-controll.error input {
	border-color: #e74c3c;
}

.form-controll small {
	color: #e74c3c;
	position: absolute;
	bottom: 0;
	left: 0px;
	visibility: hidden;
}

.form-controll.error small {
	visibility: visible;
}

	</style>
</head>
<body>
	

   
         
                        
          <main>
            @yield('content')
        </main>   
                
               
    

	
	
<script>

const formRegistry = document.getElementById('registry');
const formLogin = document.getElementById('login')
const username = document.getElementById('name');
const email = document.getElementById('email');
const password = document.getElementById('password');
const password2 = document.getElementById('password-confirm');

if (!formLogin) {
	formRegistry.addEventListener('submit', e => {
	checkInputsRegistry(e);
});
} else {
	formLogin.addEventListener('submit', e => {
	checkInputLogin(e);
	
});
   
}

function checkInputsRegistry(e) {
	// trim to remove the whitespaces
	const usernameValue = username.value.trim();
	const emailValue = email.value.trim();
	const passwordValue = password.value.trim();
	const password2Value = password2.value.trim();
	
	if(usernameValue === '') {
		e.preventDefault();
		setErrorFor(username, 'Tên đăng nhập không được để trống !');
	} else {
		setSuccessFor(username);
	}
	
	if(emailValue === '') {
		e.preventDefault();
		setErrorFor(email, 'Vui lòng nhập vào email của bạn !');
	} else if (!isEmail(emailValue)) {
		e.preventDefault();
		setErrorFor(email, 'Email không hợp lệ !');
	} else {
		setSuccessFor(email);
	}
	
	if(passwordValue === '') {
		e.preventDefault();
		setErrorFor(password, 'Mật khẩu không được để trống !');
	} else {
		setSuccessFor(password);
	}
	
	if(password2Value === '') {
		e.preventDefault();
		setErrorFor(password2, 'Vui lòng nhập lại mật khẩu !');
	} else if(passwordValue !== password2Value) {
		e.preventDefault();
		setErrorFor(password2, 'Mật khẩu không trùng khớp !');
	} else{
		setSuccessFor(password2);
	}
	
}
function checkInputLogin(e){
	const emailValue = email.value.trim();
	const passwordValue = password.value.trim();

	if(emailValue === '') {
		e.preventDefault();
		setErrorFor(email, 'Vui lòng nhập vào email của bạn !');
	} else if (!isEmail(emailValue)) {
		e.preventDefault();
		setErrorFor(email, 'Email không hợp lệ !');
	} else {
		setSuccessFor(email);
	}
	
	if(passwordValue === '') {
		e.preventDefault();
		setErrorFor(password, 'Mật khẩu không được để trống !');
	} else {
		setSuccessFor(password);
	}
	
}

function setErrorFor(input, message) {
	const box = input.parentElement;
	const small = box.querySelector('small');
	box.className = 'form-controll error';
	small.innerText = message;
}

function setSuccessFor(input) {
	const box = input.parentElement;
       box.className = 'form-controll success';
}
	
function isEmail(email) {
	return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}


</script>
</body>
</html>