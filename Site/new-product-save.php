<?php 
include("inc/connect.php");
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	$product_name		=	$_POST['product_name'];
	$product_price		=	$_POST['product_price'];
	$category_id		=	$_POST['category'];
	
	if($category_id =='Metal'){
			$category_id=1;
			echo "$category_id";
	}else if($category_id =='Metal Frame'){
			$category_id=2;
			echo "$category_id";
	}else if($category_id =='Plastic'){
			$category_id=3;
			echo "$category_id";		
	}else if($category_id =='Pocelain'){
			$category_id=4;
			echo "$category_id";		
	}else if($category_id =='Teeth'){
			$category_id=5;
			echo "$category_id";		
	}else{
			$category_id=6;
			echo "$category_id";		
	}
	
	//echo "<br>$product_name<br>$product_price";
	
	if(empty($product_name)||empty($product_price)||empty($category_id))
	{
		exit("<script>alert('Please insert all data');history.back();</script>");
	}

	if(!is_numeric($product_price))
	{
		exit("<script>alert('Price is must be a number');history.back();</script>");
	}
	
	
	$sql = 		"insert into product set
				product_name    = '$product_name',
				price    		= '$product_price',
				category_id     = '$category_id'";
				
	mysql_query($sql) or die(mysql_error());
	exit("<script>alert('New Product is saved');window.location='index.php';</script>");
	

?>
</body>
</html>