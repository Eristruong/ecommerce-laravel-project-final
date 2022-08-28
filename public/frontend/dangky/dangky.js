const form = document.getElementById('registry');
const username = document.getElementById('name');
const email = document.getElementById('email');
const password = document.getElementById('password');
const password2 = document.getElementById('password-confirm');

form.addEventListener('submit', e => {
	e.preventDefault();
	
	checkInputs();
});

function checkInputs() {
	// trim to remove the whitespaces
	const usernameValue = username.value.trim();
	const emailValue = email.value.trim();
	const passwordValue = password.value.trim();
	const password2Value = password2.value.trim();
	
	if(usernameValue === '') {
		setErrorFor(username, 'Tên đăng nhập không được để trống !');
	} else {
		setSuccessFor(username);
	}
	
	if(emailValue === '') {
		setErrorFor(email, 'Vui lòng nhập vào email của bạn !');
	} else if (!isEmail(emailValue)) {
		setErrorFor(email, 'Email không hợp lệ !');
	} else {
		setSuccessFor(email);
	}
	
	if(passwordValue === '') {
		setErrorFor(password, 'Mật khẩu không được để trống !');
	} else {
		setSuccessFor(password);
	}
	
	if(password2Value === '') {
		setErrorFor(password2, 'Vui lòng nhập lại mật khẩu !');
	} else if(passwordValue !== password2Value) {
		setErrorFor(password2, 'Mật khẩu không trùng khớp !');
	} else{
		setSuccessFor(password2);
	}
}

function setErrorFor(input, message) {
	const box = input.parentElement;
	const small = box.querySelector('small');
	box.className = 'form-control error';
	small.innerText = message;
}

function setSuccessFor(input) {
	const box = input.parentElement;
       box.className = 'form-control success';
}
	
function isEmail(email) {
	return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}













// SOCIAL PANEL JS
const floating_btn = document.querySelector('.floating-btn');
const close_btn = document.querySelector('.close-btn');
const social_panel_container = document.querySelector('.social-panel-container');

floating_btn.addEventListener('click', () => {
	social_panel_container.classList.toggle('visible')
});

close_btn.addEventListener('click', () => {
	social_panel_container.classList.remove('visible')
});