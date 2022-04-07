<?php
	include('config.php');
	session_start();
	ob_start();
?>
<script src="assets/js/jquery-3.3.1.min.js"></script>
<?php
$fv = 0;

$search = '';
	
	$subcat='';$gender='';$coll='';$cat='';
	
	if(isset($_REQUEST['price']))
	{
		$price = $_REQUEST['price'];
		list($lval, $hval) = explode('-',$price);
		$low = trim($lval);$high = trim($hval);
	}
	
	if(isset($_REQUEST['porder']))
	{
		$porder = $_REQUEST['porder'];
		if($porder == 'H-L')
			$orderby = 'order by totamt desc';
		if($porder == 'L-H')
			$orderby = 'order by totamt asc';
	}
	else
	{
		$orderby = 'order by isNew desc,id desc';
	}	
		
		$mlow = $_REQUEST['mlow'];
		$mhigh = $_REQUEST['mhigh'];
		$dlow = $_REQUEST['dlow'];
		$dhigh = $_REQUEST['dhigh'];
	
	if(isset($_REQUEST['subcat']))
		$subcat = $_REQUEST['subcat'];
	if(isset($_REQUEST['gender']))
		$gender = $_REQUEST['gender'];
	if(isset($_REQUEST['collection']))
		$coll = $_REQUEST['collection'];
	if(isset($_REQUEST['category']))
		$cat = $_REQUEST['category'];
	
	$limit = $_REQUEST['rcount'];
	$perpage = 24;


if($mlow != '')
{
	if($fv == 0)
	{
		$search = "nwt >= '".$mlow."' and nwt <= '".$mhigh."'";
		$fv++;
	}
	else
	{	
		$search = $search." and nwt >= '".$mlow."' and nwt <= '".$mhigh."'";
	}
}
if($dlow != '')
{
	if($fv == 0)
	{
		$search = "dwt >= '".$dlow."' and dwt <= '".$dhigh."'";
		$fv++;
	}
	else
	{	
		$search = $search." and dwt >= '".$dlow."' and dwt <= '".$dhigh."'";
	}
}	
if($gender != '')
{
	if($fv == 0)
	{
		$search = "gender = '".$gender."'";
		$fv++;
	}
	else
	{	
		$search = $search." and gender = '".$gender."'";
	}
}
if($cat != '')
{
	if($fv == 0)
	{
		$search = "category = '".$cat."'";
		$fv++;
	}
	else
	{	
		$search = $search." and category = '".$cat."'";
	}
}
if($coll != '')
{
	if($fv == 0)
	{
		$search = "collection = '".$coll."'";
		$fv++;
	}
	else
	{	
		$search = $search." and collection = '".$coll."'";
	}
}
if($subcat != '')
{
	if($fv == 0)
	{
		$search = "subcategory = '".$subcat."'";
		$fv++;
	}
	else
	{	
		$search = $search." and subcategory = '".$subcat."'";
	}
} 
	$sql = "SELECT id,gwt,nwt,dwt,dpcs,designno,isNew,titleline,totamt,isBestsale FROM designmaster where iswebdesign=1 and ".$search." ".$orderby." limit " . $limit . "," . $perpage;
	$sql1 = "SELECT id FROM designmaster where iswebdesign=1 and ".$search;
	
	$result = mysqli_query($conn,$sql);
	$descount = mysqli_num_rows($result);
	$tot_query = mysqli_query($conn,$sql1);
	$tot_count = mysqli_num_rows($tot_query);
	$curr = $limit + $descount;
?>
<!--== Header Area End ==-->

<!--== Page Content Wrapper Start ==-->
            <!-- Shop Page Content Start -->
				<div class="row">
					<?php 
						while($temp = mysqli_fetch_array($result))
						{
							$design = $temp['designno'];
							$titleline = $temp['titleline'];
							$newp = $temp['isNew'];
							$bestp = $temp['isBestsale'];
							$sql2 = "SELECT image FROM designimages where designno = '$design' and isDefault=1";
							$result2 = mysqli_query($conn,$sql2);
							$temp2 = mysqli_fetch_array($result2);
							$sql22 = "SELECT medimg FROM designimages where designno = '$design' and isRollOver=1";
							$result22 = mysqli_query($conn,$sql22);
							$temp22 = mysqli_fetch_array($result22);
					?>
					<div class="col-md-3 col-sm-6">
						<div class="product-grid">
							<div class="product-image">
								<a href="productdetail.php?desno=<?php echo $design; ?>" class="image" target="_blank">
									<img class="pic-1 img-fluid" src="admin/<?php echo $temp2['image']; ?>">
									<img class="pic-2 img-fluid" src="admin/<?php echo $temp22['medimg']; ?>">
								</a>
								<?php if($bestp == 1){?>
								<div class="tag best-seller">Best Seller</div>
								<?php }?>
								<?php if($newp == 1){?>
								<div class="tag new">New</div>
								<?php }?>
								<a class="product-links" data-tip="Add to Wishlist"><i class="fa fa-heart-o"></i></a>
							</div>
							<div class="product-content">
								<div class="product-title"><a href="productdetail.php?desno=<?php echo $design; ?>" target="_blank"><?php echo $titleline; ?></a></div>
								<div class="product-price">
									<span><span class="orignal-price">$ <?php echo $temp['totamt']; ?></span><small class="discount-price">/<del>$ <?php echo $temp['totamt']; ?></del></small></span>
									<span class="sku"><?php echo $design; ?></span>
								</div>
								<div class="wt-sku d-flex justify-content-between">
									<span class="weight"><?php echo round($temp['gwt'],1); ?> gms</span>
									<span class="weight">Dwt :<?php echo round($temp['dwt'],3); ?> cts</span>
								</div>
								<div class="addcart">
									<a href="#" class="btn btn-block btn-blue">Add To Cart</a>
								</div>
							</div>
						</div>
					</div>
					<?php }?>
					<div class="fixed-wrapper">
						<div class="fixed">
							<p id="showmsg" style="padding:10px 10px 10px 10px;background:#d1e7dd;border-radius:20px;position:fixed;top:48%;left:28%;color:#0f5132;display:none"></p>
						</div>
					</div>
				</div>				

<script>
$(document).ready(function(){
	$(".product-links i").click(function(){
		$(this).toggleClass("fa-heart fa-heart-o");
	});
});
</script>			
