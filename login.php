<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Shreeji Jewelers | Login</title>
</head>

<body>
	
	<div class="wrapper-container">
	<?php include('header.php'); ?>
		<!-- banner 1 area start-->
		<!--<div class="banner-1">
			<div class="banner-img">
				<img class="img-fluid" src="assets/img/shreeji_banner_6.png" />
				<div class="overlay">
					<button class="btn btn-primary">Shop Now</button>
				</div>
			</div>
		</div>-->
		<!-- banner 1 area end-->
		<!-- Login area start -->
		<div class="login">
			<div class="container">
				<div class="row">
					<div class="col-md-9 m-auto">
						<div class="login-box d-flex align-items-center">
							<div class="login-pic">
								<img src="assets/img/login_banner.png" class="img-fluid" alt="login image" />
							</div>
							<div class="login-aria p-4">
								<form id="form-validate" action="" method="post">
									<div class="login-logo">
										<img class="img-fluid" src="assets/img/logo.png" width="150" alt="logo" />
									</div>
									<h5 class="font-weight-normal mb-3">Sign into your account</h5>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fa fa-user"></i></span>
										</div>
										<input type="email" class="form-control" placeholder="User Id">
									</div>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fa fa-lock"></i></span>
										</div>
										<input type="password" class="form-control" placeholder="Password">
									</div>
									<div class="form-outline mb-3">
										<button class="form-control btn btn-blue btn-block" type="submit">Login</button>
									</div>
									<div class="form-outline mb-3 d-md-flex">
										<div class="w-50 text-left">
											<label class="checkbox-wrap checkbox-blue mb-0"> 
												<input type="checkbox" class="form-control">Remember Me
												<span class="checkmark"></span>
											</label>
										</div>
										<div class="w-50 text-md-right">
											<a href="password-forgot.php">Forgot Password</a>
										</div>
									</div>
									<p class="text-center">Not a member? <a href="register.php">Sign Up</a></p>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Login area end -->
		<?php include('footer.php'); ?>
	</div>
	
	

</body>
</html>
