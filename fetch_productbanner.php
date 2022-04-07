<?php
$fv = 0;
$search = '';
	session_start();
	ob_start();
	include('config.php');
	$gender='';$coll='';$cat='';$subcat='';
	if(isset($_REQUEST['gender']))
		$gender = $_REQUEST['gender'];
	if(isset($_REQUEST['collection']))
		$coll = $_REQUEST['collection'];
	if(isset($_REQUEST['category']))
		$cat = $_REQUEST['category'];

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

	$sql3 = "SELECT image FROM productbanner where gender='$gender' and category = '$cat' and subcategory='$subcat' and collection = '$coll'";
	$result3 = mysqli_query($conn,$sql3);
	$temp3 = mysqli_fetch_array($result3);
?>
	<?php if($temp3['image'] == ''){?>
	<img class="img-fluid" src="assets/img/shreeji_banner_4.png" style="width:100%">
	<?php }else{?>
	<img class="img-fluid" src="https://admin.palakjewels.in/<?php echo $temp3['image']; ?>" style="width:100%">
	<?php }?>