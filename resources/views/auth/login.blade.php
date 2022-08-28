
    @extends('layout.user.app')
    @section('content')
	<div class="limiter">
		<div class="container-login100" style="background-image: url('public/frontend/dangky/images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                <form id="login" class="login100-form validate-form" method="post" action="{{ route('login') }}">
                    {{ csrf_field() }}
					<span style="color: #4A235A;"  class="login100-form-title p-b-49">
						ĐĂNG NHÂP
					</span>
                    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->get('email') as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    </div>
@endif
					<div class="wrap-input100 validate-input m-b-23" data-validate = "Vui lòng nhập vào Email">
						<div class="form-controll">
						<span class="label-input100">Email</span>
						<input class="input100" type="email" id="email" name="email" placeholder="Nhập vào Email !" value="{{ old('email') }}">
						{{-- <span class="focus-input100" data-symbol="&#xf206;"></span> --}}
						<small>Vui lòng nhập vào thông tin này</small>
				     	</div>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Vui lòng nhập mật khẩu">
						<div class="form-controll">
						<span class="label-input100">Mật khẩu</span>
						<input class="input100" type="password" name="password" id="password" type="password" placeholder="Nhập mật khẩu !">
						<small>Vui lòng nhập vào thông tin này</small>
					    </div>
					</div>
					
					<div class="text-right p-t-8 p-b-31">
						@if (Route::has('password.request'))
						<a href="{{ route('password.request') }}">
							Quên mật khẩu ?
						</a>
						 @endif
					</div>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="submit" class="login100-form-btn">
								Đăng nhập
							</button>
						</div>
					</div>

					<div class="txt1 text-center p-t-54 p-b-20">
						<span>
							Hoặc đăng nhập bằng
						</span>
					</div>

					<div class="flex-c-m">
						<a href="#" class="login100-social-item bg1">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="#" class="login100-social-item bg2">
							<i class="fa fa-twitter"></i>
						</a>

						<a href="#" class="login100-social-item bg3">
							<i class="fa fa-google"></i>
						</a>
					</div>

					<div class="flex-col-c p-t-60">
						<span class="txt1 p-b-17">
							Hoặc đăng kí tài khoản
						</span>

						<a href="{{ route('register') }}" class="txt2">
							Đăng kí
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	@endsection
