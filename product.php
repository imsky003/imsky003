<?php
	session_start();
	include('header.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Shreeji Jewelers | Product</title>
</head>
<?php
$fv = 0;
$search = '';

	$gender='';$coll='';$cat='';$subcat='';
	if(isset($_REQUEST['subcat']))
		$subcat = $_REQUEST['subcat'];
	if(isset($_REQUEST['collection']))
		$coll = $_REQUEST['collection'];
	if(isset($_REQUEST['category']))
		$cat = $_REQUEST['category'];
?>
<body>
	<form method="post">
		<input type="hidden" id="rcount" value="0" />
		<input type="hidden" id="total" value="0" />
		<input type="hidden" id="subcat" />
		<input type="hidden" id="mlow" />
		<input type="hidden" id="mhigh" />
		<input type="hidden" id="dlow" />
		<input type="hidden" id="dhigh" />
		<input type="hidden" id="coll" value="<?php echo $coll; ?>" />
		<input type="hidden" id="cat" value="<?php echo $cat; ?>"/>
		<input type="hidden" id="gender" value="<?php echo $gender; ?>"/>
	</form>
	<div class="wrapper-container">
		<!-- banner 1 area start-->
		<div class="banner-1">
			<div id="product-banner" class="banner-img">
				<!--<img class="img-fluid" src="assets/img/shreeji_banner_4.png" />-->
				<div class="overlay">
					<!--<button class="btn btn-primary">Shop Now</button>-->
				</div>
			</div>
		</div>
		<!-- banner 1 area end-->
		<!-- product page area start-->
		<div class="product-page">
			<div class="product-filter-sticky">
				<div class="ruby-container">
					<div class="row mt-3 product-filter">
						<div class="col-md-12">
							<div class="d-flex justify-content-between">
								<div class="d-flex justify-content-start">
									<div class="form-inline my-2 mr-lg-2 radio bg-light border"><span class="blue-lable" id="totalitem"> </span> <span class="blue-lable ml-2"> Item Found</span></div>
								</div>
								<div class="d-flex justify-content-end">
									
									<!--<div class="form-inline d-flex align-items-center my-2 mr-lg-2 radio bg-light border"> 
										<label class="options">Most Popular <input type="radio" name="item" > <span class="checkmark"></span></label> 
										<label class="options">Latest Item <input type="radio" name="item" > <span class="checkmark"></span></label> 
										<label class="options">Cheapest <input type="radio" name="item" > <span class="checkmark"></span></label> 
										<label class="options">Trending <input type="radio" name="item" checked> <span class="checkmark"></span></label> 
									</div>-->
									<div class="form-inline d-flex align-items-center my-2 mr-lg-2 radio bg-light border"> 
										<label class="options">High To Low Price <input value="H-L" type="radio" name="pricelh" onclick="price();" id="phl"> <span class="checkmark"></span></label> 
										<label class="options">Low To High Price <input value="L-H" type="radio" name="pricelh" onclick="price();" id="plh" checked="checked"> <span class="checkmark"></span></label> 
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="d-flex justify-content-between">
								<div class="form-inline d-flex align-items-center my-2 mr-lg-2 radio add-menu">
									<div class="text-muted filter-label">Applied Filters:</div>
									<!--<div class="green-label bg-light border ml-2">Earings <span class="close">&times;</span></div>
									<div class="green-label bg-light border ml-2">Ear Cuff <span class="close">&times;</span></div>-->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="ruby-container">
				<div class="row">
					<div class="col-md-3 mt-3">
						<p id="sidemenu"></p>
					</div>
					<div class="col-md-9 mt-3">
						<div class="all-product-box">
							<p id="display"></p>
						</div>
						<div class="row">
							<div class="col-md-12 mb-2 text-center">
								<span class="tot_label">Total Designs <label id="currcount"></label> Out Of <label id="totcount"></label></span>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="load-more">
									<a class="btn btn-blue" id="loadmore">View More <span>&#8594;</span></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- product page area end-->
		<?php include('footer.php'); ?>
	</div>

	
	<!--heart icon change on click script-->
<script>
$(document).ready(function(){
	$('#loadmore').click(function(){
		var totcount = document.getElementById("total").value;
		var rcount=document.getElementById("rcount").value;
		var mlow=document.getElementById("mlow").value;
		var mhigh=document.getElementById("mhigh").value;
		var dlow=document.getElementById("dlow").value;
		var dhigh=document.getElementById("dhigh").value;
		var category=document.getElementById("cat").value;
		var collection=document.getElementById("coll").value;
		var gender=document.getElementById("gender").value;
		var subcat=document.getElementById("subcat").value;
		var rcount = Number(rcount) + 24;
		
		$.ajax({
			url:"ajax-product.php",
			method:"POST",
			data:{category:category,collection:collection,gender:gender,rcount:rcount,subcat:subcat,mlow:mlow,mhigh:mhigh,dlow:dlow,dhigh:dhigh},
			beforeSend:function(){
				$('#loadmore').text("Loading.....");
			},
			success:function(data){
				setTimeout(function(){
				
					if(data != '')
					{
						$('#display').append(data);
						$('#loadmore').text("View More");
					}
					else
					{
						$('#loadmore').hide();
					}
					document.getElementById("rcount").value=rcount;
					var curr = rcount + 24;
					if(curr > totcount)
					{
						var curr = totcount;
						$('#loadmore').hide();
						
					}
					$('#currcount').html(curr);
				},2000);
			}
		});
		$.ajax({
			url:"ajax-sidemenu.php",
			method:"POST",
			data:{category:category,collection:collection,gender:gender,subcat:subcat},
			success:function(data){
				$('#sidemenu').html(data);
			}
		});
		return false;
	});
});
window.onload = function () {
	var path = '';
	var rcount=0;
	var tc=0;
	var mlow=document.getElementById("mlow").value;
	var mhigh=document.getElementById("mhigh").value;
	var dlow=document.getElementById("dlow").value;
	var dhigh=document.getElementById("dhigh").value;
	var category=document.getElementById("cat").value;
	var collection=document.getElementById("coll").value;
	var gender=document.getElementById("gender").value;
	if(document.getElementById("phl").checked) {
		var porder = document.getElementById("phl").value;
	}
	if(document.getElementById("plh").checked) {
		var porder = document.getElementById("plh").value;
	}
	$.ajax({
		url:"fetch_productbanner.php",
		method:"POST",
		data:{category:category,collection:collection,gender:gender,subcat:subcat},
		success:function(data){
			$('#product-banner').html(data);
		}
	});
	$.ajax({
		url:"ajax-sidemenu.php",
		method:"POST",
		data:{category:category,collection:collection,gender:gender},
		success:function(data){
			$('#sidemenu').html(data);
		}
	});
	$.ajax({
		url:"ajax-product.php",
		method:"POST",
		data:{category:category,collection:collection,gender:gender,rcount:rcount,mlow:mlow,mhigh:mhigh,dlow:dlow,dhigh:dhigh,porder:porder},
		success:function(data){
			$('#display').html(data);
		}
	});
	$.ajax({
		url:"ajax-count.php",
		method:"POST",
		data:{category:category,collection:collection,gender:gender,rcount:rcount,mlow:mlow,mhigh:mhigh,dlow:dlow,dhigh:dhigh,porder:porder},
		success:function(data){
			$('#totcount').html(data);
			$('#totalitem').html(data);
			//document.getElementById("totalitem") = data;
			document.getElementById("total").value=data;
			var tc = data;
			var curr = rcount + 24;
			if(curr > tc)
			{
				var curr = tc;
				$('#loadmore').hide();
			}
			$('#currcount').html(curr);
			
		}
	});
	document.getElementById("rcount").value=rcount;
	
	$.ajax({
		url:"fetch_cart.php",
		method:"POST",
		success:function(data){
			$('#cartitem').html(data);
		}
	});
	if(collection != '')
	{
		<!--$(".add-menu").append('<div class="remove green-label bg-light border ml-2">' + collection + '<span class="close">&times;</span></div>');-->
		$(".add-menu").append('<div class="remove green-label bg-light border ml-2"><span>' + collection + '</span><span class="close">&times;</span></div>');
	}
	if(gender != '')
	{
		<!--$(".add-menu").append('<div class="remove green-label bg-light border ml-2">' + gender + '<span class="close">&times;</span></div>');-->
		$(".add-menu").append('<div class="remove green-label bg-light border ml-2"><span>' + gender + '</span><span class="close">&times;</span></div>');
	}
	if(category != '')
	{
		<!--$(".add-menu").append('<div class="remove green-label bg-light border ml-2">' + category + '<span class="close">&times;</span></div>');-->
		$(".add-menu").append('<div class="remove green-label bg-light border ml-2"><span>' + category + '</span><span class="close">&times;</span></div>');
	}
	return false;
}
function price(myvalue)
{
		var rcount=0;
		var mlow=document.getElementById("mlow").value;
		var mhigh=document.getElementById("mhigh").value;
		var dlow=document.getElementById("dlow").value;
		var dhigh=document.getElementById("dhigh").value;
		var category=document.getElementById("cat").value;
		var collection=document.getElementById("coll").value;
		var subcat=document.getElementById("subcat").value;
		var gender=document.getElementById("gender").value;
		if(document.getElementById("phl").checked) {
			var porder = document.getElementById("phl").value;
		}
		if(document.getElementById("plh").checked) {
			var porder = document.getElementById("plh").value;
		}
		$.ajax({
			url:"ajax-product.php",
			method:"POST",
			data:{category:category,subcat:subcat,collection:collection,gender:gender,rcount:rcount,mlow:mlow,mhigh:mhigh,dlow:dlow,dhigh:dhigh,porder:porder},
			success:function(data){
				$('#display').html(data);
			}
		});
		$.ajax({
			url:"ajax-sidemenu.php",
			method:"POST",
			data:{category:category,collection:collection,subcat:subcat,gender:gender},
			success:function(data){
				$('#sidemenu').html(data);
			}
		});
		$.ajax({
			url:"ajax-count.php",
			method:"POST",
			data:{category:category,subcat:subcat,collection:collection,gender:gender,rcount:rcount,mlow:mlow,mhigh:mhigh,dlow:dlow,dhigh:dhigh,porder:porder},
			success:function(data){
				$('#totcount').html(data);
				$('#totalitem').html(data);
				document.getElementById("total").value=data;
				var tc = data;
				var curr = rcount + 24;
				if(curr > tc)
				{
					var curr = tc;
					$('#loadmore').hide();
				}
				$('#currcount').html(curr);
			}
		});
		document.getElementById("rcount").value=rcount;
		document.getElementById("coll").value=myvalue;
		$.ajax({
			url:"fetch_productbanner.php",
			method:"POST",
			data:{category:category,collection:myvalue,subcat:subcat,gender:gender},
			success:function(data){
				$('#product-banner').html(data);
			}
		});
		return false;
}

function subcat(myvalue)
{
		var rcount=0;
		$(".add-menu").append('<div class="remove green-label bg-light border ml-2"><span>' + myvalue + '</span><span class="close">&times;</span></div>');
		var mlow=document.getElementById("mlow").value;
		var mhigh=document.getElementById("mhigh").value;
		var dlow=document.getElementById("dlow").value;
		var dhigh=document.getElementById("dhigh").value;
		var category=document.getElementById("cat").value;
		var collection=document.getElementById("coll").value;
		var gender=document.getElementById("gender").value;
		$.ajax({
			url:"ajax-product.php",
			method:"POST",
			data:{category:category,collection:collection,subcat:myvalue,gender:gender,rcount:rcount,mlow:mlow,mhigh:mhigh,dlow:dlow,dhigh:dhigh},
			success:function(data){
				$('#display').html(data);
			}
		});
		$.ajax({
			url:"ajax-sidemenu.php",
			method:"POST",
			data:{category:category,collection:collection,subcat:myvalue,gender:gender},
			success:function(data){
				$('#sidemenu').html(data);
			}
		});
		$.ajax({
			url:"ajax-count.php",
			method:"POST",
			data:{category:category,collection:collection,subcat:myvalue,gender:gender,rcount:rcount,mlow:mlow,mhigh:mhigh,dlow:dlow,dhigh:dhigh},
			success:function(data){
				$('#totcount').html(data);
				$('#totalitem').html(data);
				document.getElementById("total").value=data;
				var tc = data;
				var curr = rcount + 24;
				if(curr > tc)
				{
					var curr = tc;
					$('#loadmore').hide();
				}
				$('#currcount').html(curr);
			}
		});
		document.getElementById("rcount").value=rcount;
		document.getElementById("subcat").value=myvalue;
		$.ajax({
			url:"fetch_productbanner.php",
			method:"POST",
			data:{category:category,collection:collection,gender:gender,subcat:myvalue},
			success:function(data){
				$('#product-banner').html(data);
			}
		});
		return false;
}
function collection(myvalue)
{
		var rcount=0;
		$(".add-menu").append('<div class="remove green-label bg-light border ml-2"><span>' + myvalue + '</span><span class="close">&times;</span></div>');
		var mlow=document.getElementById("mlow").value;
		var mhigh=document.getElementById("mhigh").value;
		var dlow=document.getElementById("dlow").value;
		var dhigh=document.getElementById("dhigh").value;
		var category=document.getElementById("cat").value;
		var subcat=document.getElementById("subcat").value;
		var gender=document.getElementById("gender").value;
		$.ajax({
			url:"ajax-product.php",
			method:"POST",
			data:{category:category,subcat:subcat,collection:myvalue,gender:gender,rcount:rcount,mlow:mlow,mhigh:mhigh,dlow:dlow,dhigh:dhigh},
			success:function(data){
				$('#display').html(data);
			}
		});
		$.ajax({
			url:"ajax-sidemenu.php",
			method:"POST",
			data:{category:category,collection:myvalue,subcat:subcat,gender:gender},
			success:function(data){
				$('#sidemenu').html(data);
			}
		});
		$.ajax({
			url:"ajax-count.php",
			method:"POST",
			data:{category:category,subcat:subcat,collection:myvalue,gender:gender,rcount:rcount,mlow:mlow,mhigh:mhigh,dlow:dlow,dhigh:dhigh},
			success:function(data){
				$('#totcount').html(data);
				$('#totalitem').html(data);
				document.getElementById("total").value=data;
				var tc = data;
				var curr = rcount + 24;
				if(curr > tc)
				{
					var curr = tc;
					$('#loadmore').hide();
				}
				$('#currcount').html(curr);
			}
		});
		document.getElementById("rcount").value=rcount;
		document.getElementById("coll").value=myvalue;
		$.ajax({
			url:"fetch_productbanner.php",
			method:"POST",
			data:{category:category,collection:myvalue,gender:gender,subcat:subcat},
			success:function(data){
				$('#product-banner').html(data);
			}
		});
		return false;
}
function category(myvalue)
{
		var rcount=0;
		$(".add-menu").append('<div class="remove green-label bg-light border ml-2"><span>' + myvalue + '</span><span class="close">&times;</span></div>');
		var mlow=document.getElementById("mlow").value;
		var mhigh=document.getElementById("mhigh").value;
		var dlow=document.getElementById("dlow").value;
		var dhigh=document.getElementById("dhigh").value;
		var collection=document.getElementById("coll").value;
		var subcat=document.getElementById("subcat").value;
		var gender=document.getElementById("gender").value;
		$.ajax({
			url:"ajax-product.php",
			method:"POST",
			data:{collection:collection,subcat:subcat,category:myvalue,gender:gender,rcount:rcount,mlow:mlow,mhigh:mhigh,dlow:dlow,dhigh:dhigh},
			success:function(data){
				$('#display').html(data);
			}
		});
		$.ajax({
			url:"ajax-sidemenu.php",
			method:"POST",
			data:{category:myvalue,collection:collection,subcat:subcat,gender:gender},
			success:function(data){
				$('#sidemenu').html(data);
			}
		});
		$.ajax({
			url:"ajax-count.php",
			method:"POST",
			data:{collection:collection,subcat:subcat,category:myvalue,gender:gender,rcount:rcount,mlow:mlow,mhigh:mhigh,dlow:dlow,dhigh:dhigh},
			success:function(data){
				$('#totcount').html(data);
				$('#totalitem').html(data);
				document.getElementById("total").value=data;
				var tc = data;
				var curr = rcount + 24;
				if(curr > tc)
				{
					var curr = tc;
					$('#loadmore').hide();
				}
				$('#currcount').html(curr);
			}
		});
		document.getElementById("rcount").value=rcount;
		document.getElementById("cat").value=myvalue;
		$.ajax({
			url:"fetch_productbanner.php",
			method:"POST",
			data:{category:myvalue,collection:collection,gender:gender,subcat:subcat},
			success:function(data){
				$('#product-banner').html(data);
			}
		});
		return false;
}
function gender(myvalue)
{
		var rcount=0;
		$(".add-menu").append('<div class="remove green-label bg-light border ml-2"><span>' + myvalue + '</span><span class="close">&times;</span></div>');
		var mlow=document.getElementById("mlow").value;
		var mhigh=document.getElementById("mhigh").value;
		var dlow=document.getElementById("dlow").value;
		var dhigh=document.getElementById("dhigh").value;
		var collection=document.getElementById("coll").value;
		var subcat=document.getElementById("subcat").value;
		var category=document.getElementById("cat").value;
		$.ajax({
			url:"ajax-product.php",
			method:"POST",
			data:{collection:collection,subcat:subcat,category:category,gender:myvalue,rcount:rcount,mlow:mlow,mhigh:mhigh,dlow:dlow,dhigh:dhigh},
			success:function(data){
				$('#display').html(data);
			}
		});
		$.ajax({
			url:"ajax-sidemenu.php",
			method:"POST",
			data:{category:category,collection:collection,subcat:subcat,gender:myvalue},
			success:function(data){
				$('#sidemenu').html(data);
			}
		});
		$.ajax({
			url:"ajax-count.php",
			method:"POST",
			data:{collection:collection,subcat:subcat,category:category,gender:myvalue,rcount:rcount,mlow:mlow,mhigh:mhigh,dlow:dlow,dhigh:dhigh},
			success:function(data){
				$('#totcount').html(data);
				$('#totalitem').html(data);
				document.getElementById("total").value=data;
				var tc = data;
				var curr = rcount + 24;
				if(curr > tc)
				{
					var curr = tc;
					$('#loadmore').hide();
				}
				$('#currcount').html(curr);
			}
		});
		document.getElementById("rcount").value=rcount;
		document.getElementById("gender").value=myvalue;
		$.ajax({
			url:"fetch_productbanner.php",
			method:"POST",
			data:{category:category,collection:collection,gender:myvalue,subcat:subcat},
			success:function(data){
				$('#product-banner').html(data);
			}
		});
		return false;
}

$(document).on("click", ".close", function(e) { 
	//$(this).parents(".remove").remove();
	var rcount=0;
	var mlow=document.getElementById("mlow").value;
	var mhigh=document.getElementById("mhigh").value;
	var dlow=document.getElementById("dlow").value;
	var dhigh=document.getElementById("dhigh").value;
	var category=document.getElementById("cat").value;
	var collection=document.getElementById("coll").value;
	var gender=document.getElementById("gender").value;
	var subcat=document.getElementById("subcat").value;
	var text = $(this).siblings().clone().text();
    $(this).parents(".remove").remove();
	
	if(text == category)
	{
		document.getElementById("cat").value='';
		var category='';
	}
	if(text == collection)
	{
		document.getElementById("coll").value='';
		var collection='';
	}
	if(text == gender)
	{
		document.getElementById("gender").value='';
		var gender='';
	}
	if(text == subcat)
	{
		document.getElementById("subcat").value='';
		var subcat='';
	}
		$.ajax({
			url:"ajax-product.php",
			method:"POST",
			data:{collection:collection,subcat:subcat,category:category,gender:gender,rcount:rcount,mlow:mlow,mhigh:mhigh,dlow:dlow,dhigh:dhigh},
			success:function(data){
				$('#display').html(data);
			}
		});
		$.ajax({
			url:"ajax-sidemenu.php",
			method:"POST",
			data:{category:category,collection:collection,subcat:subcat,gender:gender},
			success:function(data){
				$('#sidemenu').html(data);
			}
		});
		$.ajax({
			url:"ajax-count.php",
			method:"POST",
			data:{collection:collection,subcat:subcat,category:category,gender:gender,rcount:rcount,mlow:mlow,mhigh:mhigh,dlow:dlow,dhigh:dhigh},
			success:function(data){
				$('#totcount').html(data);
				$('#totalitem').html(data);
				document.getElementById("total").value=data;
				var tc = data;
				var curr = rcount + 24;
				if(curr > tc)
				{
					var curr = tc;
					$('#loadmore').hide();
				}
				else{
					$('#loadmore').show();
				}
				$('#currcount').html(curr);
			}
		});
});

</script>


</body>
</html>
