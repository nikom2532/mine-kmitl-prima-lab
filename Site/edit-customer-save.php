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
	$cus_id				=	$_POST['cus_id'];
	$customer_name		=	$_POST['cus-name'];
	$customer_address	=	$_POST['address'];
	$customer_tel		=	$_POST['tel-number'];
	$shipping_address	=	$_POST['shipping'];
	
	//echo "$cus_id<br>";

	
	$sql1 = "update customer set 
			customer_name		= '$customer_name',
			customer_address	= '$customer_address',
			customer_tel		= '$customer_tel',
			shipping_address	= '$shipping_address'
			where cus_id  		= '$cus_id' ";
	mysql_query($sql1) or die(mysql_error());
	
	
	$sql2 = "update orders set 
			customer_name		= '$customer_name'
			where cus_id  		= '$cus_id' ";
	mysql_query($sql2) or die(mysql_error());
	
	
	
	exit("<script>window.location='customer.php';</script>");
	
?>
</body>
</html>