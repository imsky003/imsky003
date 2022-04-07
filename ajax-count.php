<?php
	include('config.php');
	session_start();
	ob_start();
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
	$sql1 = "SELECT id FROM designmaster where iswebdesign=1 and ".$search;
	$tot_query = mysqli_query($conn,$sql1);
	$tot_count = mysqli_num_rows($tot_query);
	echo $tot_count;
?>