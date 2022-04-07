<?php
	include('config.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link rel="icon" href="assets/img/favicon.png" type="image/png">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/font-awesome.css" />
	<link rel="stylesheet" href="assets/css/style.css" />
	
</head>
	
	<!-- header area start-->
		<header class="main-header">
			<div class="header-panel">
				<!--<p class="covid-block">
					Our stores in NJ & NC are open, following all the guidelines to prioritize health and safety for everyone.<br />
					Our online store is shipping all over USA & curbside pick-up is available in NJ. <a href="#">Learn More</a>
				</p>-->
				<div class="block-panel">
					<div class="container">
						<div class="row">
							<div class="col-lg-3 col-md-3 col-sm-12 align-self-center">
								<p class="m-0">ONLINE INQUIRIES : <a class="number" href="../raj_jewels/1-833-228-8725">1-833-228-8725</a></p>
							</div>
							<div class="col-lg-7 col-md-7 m-auto col-sm-12 align-self-center">
								<span class="info-header">FREE SHIPPING ON $350<i class="fa fa-diamond ml-2 mr-2" aria-hidden="true"></i>QUALITY GUARANTEED<i class="fa fa-diamond ml-2 mr-2" aria-hidden="true"></i>EASY EXCHANGE AND RETURNS</span>
							</div>
							<div class="col-lg-2 col-md-2 col-sm-12 align-self-center">
								<ul class="d-flex justify-content-between m-0">
									<li class="list-unstyled"><a class="social-media" href="#"><i class="fa fa-facebook"></i></a></li>
									<li class="list-unstyled"><a class="social-media" href="#"><i class="fa fa-instagram"></i></a></li>
									<li class="list-unstyled"><a class="social-media" href="#"><i class="fa fa-twitter"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<nav class="navbar navbar-expand-lg navbar-light sticky-top">
				<div class="container-fluid">
					<a class="navbar-brand" href="https://shreejijewelers.com"><img src="assets/img/logo.png" alt="logo" width="150" /></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mobile_nav" aria-controls="mobile_nav" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span> 
					</button>
					<div class="collapse navbar-collapse" id="mobile_nav">
					<ul class="navbar-nav mr-auto mt-2 mt-lg-0 ml-3"></ul>
					<ul class="navbar-nav navbar-light">
						<li class="nav-item"><a class="nav-link" href="https://shreejijewelers.com">Home</a></li>
						<!--========-->
						<li class="nav-item dropdown megamenu-li dmenu">
							<a class="nav-link dropdown-toggle" href="" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Jewellery</a>
							<div class="dropdown-menu megamenu sm-menu border-top" aria-labelledby="dropdown01">
								<div class="row menu-bg">
									<?php 
										$sql = "SELECT distinct(category) FROM designmaster where iswebdesign=1";
										$result = mysqli_query($conn,$sql);
										while($temp = mysqli_fetch_array($result)){?>
									<div class="col-sm-6 col-lg-2 border-right mb-4">
										
										<h6><a href="product.php?category=<?php echo $temp['category'];?>"><?php $category = $temp['category'];echo $category; ?></a></h6>
										<?php 
											$sql2 = "SELECT distinct(subcategory) FROM designmaster where iswebdesign=1 and category = '$category'";
											$result2 = mysqli_query($conn,$sql2);
											while($temp2 = mysqli_fetch_array($result2)){?>
										<a class="dropdown-item" href="product.php?category=<?php echo $category;?> && subcat=<?php echo $temp2['subcategory'];?>"><?php echo $temp2['subcategory']; ?></a>
										<?php }?>
									</div>
									<?php }?>
								</div>
							</div>
						</li>
						<li class="nav-item dmenu dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Collection</a>
							<div class="dropdown-menu sm-menu" aria-labelledby="navbarDropdown">
								<?php 
									$sql3 = "SELECT distinct(collection) FROM designmaster where iswebdesign=1 and package in (".$package.")";
									$result3 = mysqli_query($conn,$sql3);
									while($temp3 = mysqli_fetch_array($result3)){
										$coll = $temp3['collection'];
								?>
								<a class="dropdown-item" href="product.php?collection=<?php echo $coll;?>"><?php echo $coll; ?></a>
								<?php }?>
							</div>
						</li>
						<!--=========-->
						<li class="nav-item"><a class="nav-link" href="product.php">New Arrivals</a></li>
						<li class="nav-item"><a class="nav-link" href="#">Gifts</a></li>
						<li class="nav-item"><a class="nav-link" href="#">Diamonds</a></li>
						<li class="nav-item search-show">
							<a class="nav-link" href="#"><i class="fa fa-search"></i></a>
							<div class="search-box">
								<button class="btn-search"><i class="fa fa-search"></i></button>
								<input type="text" class="input-search" placeholder="Type to Search...">
							</div>
						</li>
						<li class="nav-item dmenu dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownUser" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i></a>
							<div class="dropdown-menu sm-menu" aria-labelledby="navbarDropdownUser">
								<a class="dropdown-item" href="register.php">Register</a>
								<a class="dropdown-item" href="login.php">Login</a>
								<a class="dropdown-item" href="#">User Id</a>
								<a class="dropdown-item" href="#">My Order</a>
								<a class="dropdown-item" href="#">My Purchase</a>
								<a class="dropdown-item" href="#">My Account</a>
								<a class="dropdown-item" href="#">Logout</a>
							</div>
						</li>
						<li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-heart"></i></a></li>
						<li class="nav-item cart-icon">
							<a class="nav-link" href="#"><i class="fa fa-shopping-cart"></i><span class="cart-count" id="cartitem">0</span></a>
						</li>
					</ul>
					</div>
				</div>
			</nav>
		</header>
		<!-- header area end-->
</html>
