
<?php
$fv = 0;
$search = '';
	session_start();
	ob_start();
	include('config.php');
	$gender='';$coll='';$cat='';$subcat='';$isnew='';
	if(isset($_REQUEST['gender']))
		$gender = $_REQUEST['gender'];
	if(isset($_REQUEST['collection']))
		$coll = $_REQUEST['collection'];
	if(isset($_REQUEST['category']))
		$cat = $_REQUEST['category'];
	if(isset($_REQUEST['subcat']))
		$subcat = $_REQUEST['subcat'];
	if(isset($_REQUEST['isnew']))
		$isnew = $_REQUEST['isnew'];

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
if($isnew != '')
{
	if($fv == 0)
	{
		$search = "isNew = '".$isnew."'";
		$fv++;
	}
	else
	{	
		$search = $search." and isNew = '".$isnew."'";
	}
}
	
if($search != '')
{	
	$sql2 = "SELECT subcategory,count(*) as qty FROM designmaster where iswebdesign=1 and ".$search." group by subcategory order by subcategory asc";
	$result2 = mysqli_query($conn,$sql2);
	
	$sql3 = "SELECT collection,count(*) as qty FROM designmaster where iswebdesign=1 and ".$search." group by collection order by collection asc";
	$result3 = mysqli_query($conn,$sql3);
	
	$sql4 = "SELECT category,count(*) as qty FROM designmaster where iswebdesign=1 and ".$search." group by category order by category asc";
	$result4 = mysqli_query($conn,$sql4);
	
	$sql5 = "SELECT gender,count(*) as qty FROM designmaster where iswebdesign=1 and ".$search." group by gender order by gender asc";
	$result5 = mysqli_query($conn,$sql5);
}
else
{
	$sql2 = "SELECT subcategory,count(*) as qty FROM designmaster where iswebdesign=1 group by subcategory order by subcategory asc";
	$result2 = mysqli_query($conn,$sql2);
	
	$sql3 = "SELECT collection,count(*) as qty FROM designmaster where iswebdesign=1 group by collection order by collection asc";
	$result3 = mysqli_query($conn,$sql3);
	
	$sql4 = "SELECT category,count(*) as qty FROM designmaster where iswebdesign=1 group by category order by category asc";
	$result4 = mysqli_query($conn,$sql4);
	
	$sql5 = "SELECT gender,count(*) as qty FROM designmaster where iswebdesign=1 group by gender order by gender asc";
	$result5 = mysqli_query($conn,$sql5);
}	
?>
<!--== Header Area End ==-->

<!--== Page Content Wrapper Start ==-->
            <!-- Shop Page Content Start -->
			<div class="card mb-2">
							<header class="card-header-1">
								<h6 class="title-sidebar">REFINE YOUR SEARCH BY</h6>
							</header>
							<article class="card-group-item mt-1">
								<header class="card-header">
									<h5 class="title">Gender</h5>
								</header>
								<div class="filter-content">
									<div class="card-body">
										<ul class="list-unstyled sidebar-list">
											<?php while($temp5=mysqli_fetch_array($result5)){?>
											<li><a class="d-flex justify-content-between" onClick="gender('<?php echo $temp5['gender']; ?>')"> <span class="nm"><?php echo $temp5['gender'];?></span> <span class="ct"><?php echo $temp5['qty']; ?></span> </a></li>
											<?php }?>
										</ul>									
									</div> <!-- card-body.// -->
								</div>
							</article><!-- card-group-item.// -->							
							<article class="card-group-item mt-1">
								<header class="card-header">
									<h5 class="title">Category</h5>
								</header>
								<div class="filter-content">
									<div class="card-body">
										<ul class="list-unstyled sidebar-list">
											<?php while($temp4=mysqli_fetch_array($result4)){?>
											<li><a class="d-flex justify-content-between" onClick="category('<?php echo $temp4['category']; ?>')"> <span class="nm"><?php echo $temp4['category'];?></span> <span class="ct"><?php echo $temp4['qty']; ?></span> </a></li>
											<?php }?>
										</ul>									
									</div> <!-- card-body.// -->
								</div>
							</article> <!-- card-group-item.// -->
							<article class="card-group-item mt-1">
								<header class="card-header">
									<h5 class="title">SubCategory</h5>
								</header>
								<div class="filter-content">
									<div class="card-body">
										<ul class="list-unstyled sidebar-list">
											<?php while($temp2=mysqli_fetch_array($result2)){?>
											<li><a class="d-flex justify-content-between" onClick="subcat('<?php echo $temp2['subcategory']; ?>')"> <span class="nm"><?php echo $temp2['subcategory'];?></span> <span class="ct"><?php echo $temp2['qty']; ?></span> </a></li>
											<?php }?>
										</ul>									
									</div> <!-- card-body.// -->
								</div>
							</article><!-- card-group-item.// -->
							<article class="card-group-item mt-1">
								<header class="card-header">
									<h5 class="title">Collection</h5>
								</header>
								<div class="filter-content">
									<div class="card-body">
										<ul class="list-unstyled sidebar-list">
											<?php while($temp3=mysqli_fetch_array($result3)){?>
											<li><a class="d-flex justify-content-between" onClick="collection('<?php echo $temp3['collection']; ?>')"> <span class="nm"><?php echo $temp3['collection'];?></span> <span class="ct"><?php echo $temp3['qty']; ?></span> </a></li>
											<?php }?>
										</ul>									
									</div> <!-- card-body.// -->
								</div>
							</article> <!-- card-group-item.// -->	
							<article class="card-group-item">
								<header class="card-header">
									<h6 class="title">Range input </h6>
								</header>
								<div class="filter-content">
									<div class="card-body">
									<div class="form-row">
									<div class="form-group col-md-6">
									  <label>Min</label>
									  <input type="number" class="form-control" id="inputEmail4" placeholder="$0">
									</div>
									<div class="form-group col-md-6 text-right">
									  <label>Max</label>
									  <input type="number" class="form-control" placeholder="$1,0000">
									</div>
									</div>
									</div> <!-- card-body.// -->
								</div>
							</article> <!-- card-group-item.// -->
						</div>