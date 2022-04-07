<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Shreeji Jewelers | Login</title>
</head>

<body>
	
	<div class="wrapper-container">
	<?php include('header.php'); ?>
		<!-- banner 1 area start-->
		<div class="banner-1">
			<div class="banner-img">
				<img class="img-fluid" src="assets/img/shreeji_banner_9.png" />
				<div class="overlay">
					<button class="btn btn-primary">Shop Now</button>
				</div>
			</div>
		</div>
		<!-- banner 1 area end-->
		<!-- Login area start -->
		<div class="register">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-10 text-center p-0 mt-3 mb-2">
						<div class="card px-0 pt-4 pb-0 mt-3 mb-3">
							<h2 class="font-weight-normal">Sign Up Your User Account</h2>
							<p>Fill all form field to go to next step</p>
							<form id="commentForm2" action="" method="post">
								<!-- progressbar -->
								<ul id="progressbar">
									<li class="active" id="account"><strong>Personal Information</strong></li>
									<li id="personal"><strong>Business Information</strong></li>
									<li id="confirm"><strong>Finish</strong></li>
								</ul>
								<div class="progress">
									<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
								</div> <br> <!-- fieldsets -->
								<fieldset>
									<div class="form-card">
										<div class="row">
											<div class="col-md-7">
												<h5 class="text-left ml-3">Personal Information:</h5>
											</div>
											<div class="col-md-5">
												<h5 class="text-right mr-3">Step 1 - 3</h5>
											</div>
										</div>
										<div class="row p-3">											
											<div class="col-md-4 form-outline">
												<label class="input">
												  <input type="text" name="fname" class="input__field form-control form-control-lg" placeholder=" " />
												  <span class="input__label">First Name</span>
												</label>	
											</div>
											<div class="col-md-4 form-outline">
												<label class="input">
												  <input type="text" name="lname" class="input__field form-control form-control-lg" placeholder=" " />
												  <span class="input__label">Last Name</span>
												</label>													
											</div>
											<div class="col-md-4 form-outline">
												<label class="input">
												  <input type="email" name="emailid" class="input__field form-control form-control-lg" placeholder=" " />
												  <span class="input__label">E-Mail Address</span>
												</label>
											</div>
											<div class="col-md-4 form-outline">
												<label class="input">
												  <input type="password" name="password" class="input__field form-control form-control-lg" placeholder=" " />
												  <span class="input__label">Password</span>
												</label>	
											</div>
											<div class="col-md-4 form-outline">
												<label class="input">
												  <input type="password" name="confirmpassword" class="input__field form-control form-control-lg" placeholder=" " />
												  <span class="input__label">Confirm Password</span>
												</label>													
											</div>
											<div class="col-md-4 form-outline">
												<label class="input">
												  <input type="number" name="number" class="input__field form-control form-control-lg" placeholder=" " />
												  <span class="input__label">Number</span>
												</label>
											</div>
											<div class="col-md-4 form-outline">
												<label class="checkbox-wrap checkbox-blue mb-0"> 
													<input type="checkbox" name="remember" class="form-control">
													<span style="margin-right: 148px;">Remember Me</span>
													<span class="checkmark"></span>
												</label>
											</div>
										</div> 
									</div> 
									<input type="button" name="next" id="next" class="next btn btn-blue" value="Next" />
								</fieldset>
								<fieldset>
									<div class="form-card">
										<div class="row">
											<div class="col-md-7">
												<h5 class="text-left ml-3">Business Information:</h5>
											</div>
											<div class="col-md-5">
												<h5 class="text-right mr-3">Step 2 - 3</h5>
											</div>
										</div>
										<div class="row p-3">											
											<div class="col-md-4 form-outline">
												<label class="input">
												  <input type="text" id="fname" class="input__field form-control form-control-lg" placeholder=" "  />
												  <span class="input__label">First Name</span>
												</label>	
											</div>
											<div class="col-md-4 form-outline">
												<label class="input">
												  <input type="text" id="lname" class="input__field form-control form-control-lg" placeholder=" " />
												  <span class="input__label">Last Name</span>
												</label>													
											</div>
											<div class="col-md-4 form-outline">
												<label class="input">
												  <input type="email" name="email" id="emailid" class="input__field form-control form-control-lg" placeholder=" " data-rule-required="true" data-rule-email="true" data-msg-email="Please enter a valid email address" />
												  <span class="input__label">E-Mail Address</span>
												</label>
											</div>
											<div class="col-md-4 form-outline">
												<label class="input">
												  <input type="password" id="password" class="input__field form-control form-control-lg" placeholder=" " />
												  <span class="input__label">Password</span>
												</label>	
											</div>
											<div class="col-md-4 form-outline">
												<label class="input">
												  <input type="password" id="confirmpassword" class="input__field form-control form-control-lg" placeholder=" " />
												  <span class="input__label">Confirm Password</span>
												</label>													
											</div>
											<div class="col-md-4 form-outline">
												<label class="input">
												  <input type="number" id="number" class="input__field form-control form-control-lg" placeholder=" " />
												  <span class="input__label">Number</span>
												</label>
											</div>
										</div>
									</div>  
									<input type="button" name="previous" class="previous btn btn-blue" value="Previous" />
									<input type="button" name="next" class="next btn btn-blue" value="Next" />
								</fieldset>
								<fieldset>
									<div class="form-card">
										<div class="row">
											<div class="col-7">
												<h5 class="text-left ml-3">Finish & SUCCESS !</h5>
											</div>
											<div class="col-5">
												<h5 class="text-right mr-3">Step 3 - 3</h5>
											</div>
										</div>
										<div class="row p-3">											
											<div class="row justify-content-center">
												<div class="col-3"> <img src="https://i.imgur.com/GwStPmg.png" class="fit-image"> </div>
											</div>
										</div>
									</div>  
									<input type="button" name="previous" class="previous btn btn-blue" value="Previous" />
									<input type="button" name="submit" class="submit btn btn-blue" value="Submit" />
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Login area end -->
		<?php include('footer.php'); ?>
	</div>

	<script type="text/javascript" src="assets/js/multi_step_form.js"></script>
		
</body>
</html>
