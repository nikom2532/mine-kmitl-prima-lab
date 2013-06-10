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
	$product_id	= $_GET['product_id'];

	$sql 	= "select * from product where product_id= '$product_id' ";
	$query	= mysql_query($sql) or die(mysql_error());
	$row	= mysql_fetch_array($query);

	$sql	= "delete from product where product_id=$product_id";
	mysql_query($sql) or die(mysql_error());
	exit("<script>window.location='index.php';</script>");
?>
</body>
</html>