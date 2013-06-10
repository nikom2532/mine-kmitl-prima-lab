<?PHP
	session_start();
	include("/inc/connect.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	$product_id		=	$_POST['product_id'];
	$category_id	=	$_POST['category'];
	$product_name	=	$_POST['product_name'];
	$price			=	$_POST['product_price'];
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
	//echo "$product_id<br>";
	
	if(empty($product_name)||empty($category_id)||empty($price))
	{
		exit("<script>alert('Data not empty');history.back();</script>");
	}

	if(!is_numeric($price))
	{
		exit("<script>alert('Price is number only');history.back();</script>");
	}
	
	$sql = "update product set 
			product_name	= '$product_name',
			category_id		= '$category_id',
			price			= '$price'
			where product_id  	= '$product_id' ";
	mysql_query($sql) or die(mysql_error());
	exit("<script>window.location='index.php';</script>");
	
?>
</body>
</html>