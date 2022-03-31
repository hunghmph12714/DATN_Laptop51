<!DOCTYPE html>
<html lang="en">
<head>
	<title>Bệnh Viện Laptop 51</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('client') }}/vendor/bootstrap/{{ asset('client') }}/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('client') }}/fonts/font-awesome-4.7.0/{{ asset('client') }}/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('client') }}/fonts/iconic/{{ asset('client') }}/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('client') }}/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('client') }}/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('client') }}/vendor/animsition/{{ asset('client') }}/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('client') }}/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('client') }}/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('client') }}/css/util.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('client') }}/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
                <a href="{{ asset('') }}" title="">
					<div class="logo">
						<img src="{{ asset('client') }}/media/image/logo2.png" alt="" class="template-logo" />
					</div>
				</a>
				<form class="login100-form validate-form">
					<span class="login100-form-title p-b-26">
						Chào mừng đến với Laptop 51
					</span>
					<span class="login100-form-title p-b-48">
						<i class="zmdi zmdi-font"></i>
					</span>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="name">
						<span class="focus-input100" data-placeholder="Họ và tên"></span>
					</div>
                    
					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="phone">
						<span class="focus-input100" data-placeholder="Số điện thoại"></span>
					</div>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="email">
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="text">
						<span class="focus-input100" data-placeholder="Địa chỉ"></span>
					</div>

					<div class="wrap-input100 validate-input">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="pass">
						<span class="focus-input100" data-placeholder="Mật khẩu"></span>
					</div>

					<div class="wrap-input100 validate-input">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="pass-onemore">
						<span class="focus-input100" data-placeholder="Nhập Lại Mật khẩu"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Đăng Ký
							</button>
						</div>
					</div>

					<div class="text-center p-t-115">
						<span class="txt1">
							Bạn đã có tài khoản?
						</span>

						<a class="txt2" href="login">
							Đăng nhập
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="{{ asset('client') }}/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="{{ asset('client') }}/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="{{ asset('client') }}/vendor/bootstrap/js/popper.js"></script>
	<script src="{{ asset('client') }}/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="{{ asset('client') }}/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="{{ asset('client') }}/vendor/daterangepicker/moment.min.js"></script>
	<script src="{{ asset('client') }}/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="{{ asset('client') }}/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>