<!DOCTYPE html>
<html lang="en">
<head>
<title>Task</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->
<!-- css files -->
<link rel="stylesheet" href="{{ asset('loginpage/css/style.css') }}" type="text/css" media="all" /> <!-- Style-CSS --> 
<link rel="stylesheet" href="{{ asset('loginpage/css/font-awesome.css') }}"> <!-- Font-Awesome-Icons-CSS -->
<!-- //css files -->
<!-- web-fonts -->
<link href="//fonts.googleapis.com/css?family=Snippet" rel="stylesheet"><!--online fonts-->
<!-- //web-fonts -->
</head>
<body>
<div data-vide-bg="video/keyboard">
	<div class="main-container">
		<!--header-->
		<div class="header-w3l">
			<h1>Task Managerment</h1>
		</div>
		<!--//header-->
		<!--main-->
		<div class="main-content-agile">
			<div class="w3ls-pro">
				<h2>Đăng Nhập</h2>
			</div>
			<div class="sub-main-w3ls">
				<form action="{{ route('login') }}" method="POST" autocomplete="on">
                    @csrf
					<span class="icon1"><i class="fa fa-envelope" aria-hidden="true"style="padding-top:15px"></i></span>
					<input type="email" name="email" value="{{ old('email') }}" placeholder="Nhập email của bạn"  required="">
                    @if ($errors->has('email'))
                        <div class="text-danger"style="color:red">
                            <ul>
                                @foreach ($errors->get('email') as $error)
                                    {{ $error }}
                                @endforeach
                            </ul>
                        </div>
                    @endif
					<input type="password"name="password"placeholder="Nhập password của bạn" required="">
					<span class="icon2"><i class="fa fa-unlock-alt"style="padding-top:30px" aria-hidden="true"></i></span>
                    @if ($errors->has('password'))
                        <div class="text-danger"style="color:red">
                            <ul>
                                @foreach ($errors->get('password') as $error)
                                    {{ $error }}
                                @endforeach
                            </ul>
                        </div>
                    @endif
					@if(session('status'))
						<div class="text-danger" role="alert"style="color:red">
							{{ session('status') }}
						</div>
					@endif
					<div class="checkbox-w3">
						<span class="check-w3"><input type="checkbox" />Remember Me</span>
						<a href="#">Forgot Password?</a>
						<div class="clear"></div>
					</div>
					<input type="submit" style="margin-top:0px"value="">
				</form>
			</div>
		</div>
		<!--//main-->
		<!--footer-->
		<div class="footer">
			<p>&copy; 2021 modern Login Form. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
		</div>
		<!--//footer-->
	</div>
</div>
<!-- js -->
<script type="text/javascript" src="{{ asset('loginpage/js/jquery-2.1.4.min.js') }}"></script><!--common-js-->
<script src="{{ asset('loginpage/js/jquery.vide.min.js') }}"></script><!--video-js-->
<!-- //js -->
</body>
</html>