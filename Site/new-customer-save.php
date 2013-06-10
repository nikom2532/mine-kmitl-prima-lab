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

	$cus_name = $_POST['cus-name'];
	$address = $_POST['address'];
	$tel_number = $_POST['tel-number'];
	$shipping = $_POST['shipping'];
	
	if(empty($cus_name)||empty($address)||empty($tel_number)||empty($shipping))
	{
		exit("<script>alert('Please insert all data');history.back();</script>");
	}

	if(!is_numeric($tel_number))
	{
		exit("<script>alert('Telephone must be a number');history.back();</script>");
	}
	
	$sqlc = "select * from customer where customer_name = '$cus_name'";
	$queryc = mysql_query($sqlc) or die (mysql_error());
	$numc = mysql_num_rows($queryc);
	
	
	if($numc == 0)
	{
		$sql = "insert into customer set
				customer_name      	= '$cus_name',
				customer_address    = '$address',
				customer_tel      	= '$tel_number',
				shipping_address   	= '$shipping'";
		mysql_query($sql) or die (mysql_error());
		exit("<script>alert('New Customer is saved');window.location= 'customer.php';</script>");
	}else
	{
		exit("<script>alert('This cutomer is already in database');history.back();</script>");
	}

?>
</body>
</html>