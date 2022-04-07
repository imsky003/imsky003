<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<!-- Footer area start -->
	<footer class="bg-white footer">
		<div class="container">
			<div class="row py-4">
				<div class="col-lg-4 col-md-6 col-sm-12 mb-4 mb-lg-0">
					<h5 class="mb-0">Find us</h5>
					<img src="assets/img/logo.png" alt="logo" width="150" />
					<p class="mb10">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
					<p><i class="fa fa-location-arrow"></i> 9878/25 sec 9 rohini 35 </p>
					<p><i class="fa fa-phone"></i>  +91-9999878398  </p>
					<p><i class="fa fa fa-envelope"></i> info@example.com  </p>
				</div>
				<div class="col-lg-2 col-md-6 col-sm-6 mb-4 mb-lg-0">
					<h5>Explore</h5>
					<ul class="list-unstyled mb-0 quick-links">
						<li class="mb-2"><a href="#"><i class="fa fa-angle-double-right"></i> For Women</a></li>
						<li class="mb-2"><a href="#"><i class="fa fa-angle-double-right"></i> For Men</a></li>
						<li class="mb-2"><a href="#"><i class="fa fa-angle-double-right"></i> Stores</a></li>
						<li class="mb-2"><a href="#"><i class="fa fa-angle-double-right"></i> Our Blog</a></li>
					</ul>
				</div>
				<div class="col-lg-2 col-md-6 col-sm-6 mb-4 mb-lg-0">
					<h5>Legal</h5>
					<ul class="list-unstyled mb-0 quick-links">
						<li class="mb-2"><a href="#"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
						<li class="mb-2"><a href="#"><i class="fa fa-angle-double-right"></i>SITE MAP</a></li>
						<li class="mb-2"><a href="#"><i class="fa fa-angle-double-right"></i>PRIVACY POLICY</a></li>
						<li class="mb-2"><a href="#"><i class="fa fa-angle-double-right"></i>TERMS & CONDITIONS</a></li>
						<li class="mb-2"><a href="#"><i class="fa fa-angle-double-right"></i>XCLUSIVE</a></li>
					</ul>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12 mb-lg-0">
					<h5>Newsletter</h5>
					<p class="text-muted mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. At itaque temporibus.</p>
					<div class="p-1 rounded border">
						<div class="input-group">
							<input type="email" placeholder="Enter your email address" aria-describedby="button-addon1" class="form-control border-0 shadow-0">
							<div class="input-group-append">
								<button id="button-addon1" type="submit" class="btn btn-link"><i class="fa fa-paper-plane"></i></button>
							</div>
						</div>
					</div>
					<ul class="list-unstyled list-inline social py-2">
						<li class="list-inline-item"><a href="#"><i class="fa fa-facebook-f"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fa fa-linkedin"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="footer-bottom">
				<p>Copyright @ 2022 All Right Reserved <a href="#">shreeji jewels</a></p>
			</div>
		</div>
	</footer>
	<!-- Footer area end -->
	<button id="scrollToTopBtn" class="btn btn-blue"><i class="fa fa-caret-up"></i></button>
	
	<script src="assets/js/jquery-3.3.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	
	<!--navbar script-->
	<script>
	$(document).ready(function () {
		$('.navbar-light .dmenu').hover(function () {
				$(this).find('.sm-menu').first().stop(true, true).slideDown(150);
			}, function () {

			$(this).find('.sm-menu').first().stop(true, true).slideUp(105)
		});
	}); 
	$(document).ready(function() {
		$(".megamenu").on("click", function(e) {
			e.stopPropagation();
		});
	});
	</script>
	<!-- back to top script-->
	<script>
	$(document).ready(function() {
        $(window).scroll(function() {
          if ($(this).scrollTop() > 50) {
            $('#scrollToTopBtn').fadeIn();
          } else {
            $('#scrollToTopBtn').fadeOut();
          }
        });
        // scroll body to 0px on click
        $('#scrollToTopBtn').click(function() {
          $('body,html').animate({
            scrollTop: 0
          }, 1000);
          return false;
        });
      });
	</script>
	
</html>
