<?php 
include("inc/connect.php");
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Customer</title>
<link href="css/reset.css" rel="stylesheet" type="text/css"/>
<link href="css/mian.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="js/mootools-core-1.3.2-full-compat-yc.js"></script>
<script type="text/javascript" src="js/menu.js"></script>

<link href="css/idealForms/idealForms.css" rel="stylesheet" type="text/css" media="screen"/> 
<link href="css/idealForms/idealForms-theme-sapphire.css" rel="stylesheet" type="text/css" media="screen"/>


<script type="text/javascript" src="js/modernizr-1.6.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery-idealForms.js"></script>
<script type="text/javascript" src="js/scripts.js"></script>

</head>

<body>
<div id="wrapper-main">
	<div id="logo-left" class="left"></div>
	<div id="wrapper-logo-main" class="left"></div>
	<div id="logo-right" class="left"></div>
</div><!--end  wrapper-main-->
   <?PHP 
   	if(!isset($_SESSION['username']))
	{
	
		echo "<script>alert('Please Login');window.location='login.php';</script>"
	?>
   <?php 
   }else
   {
   ?>
<div id="login-box">
	<ul>
		<li>[ <?PHP echo $_SESSION['username']?> ]</li>
		<a href="logout.php"><li>Log out</li></a>
	</ul>
</div>
<?php } ?>
<div id="wrapper-menu">
<div id="top_navigation">
	<ul class="nav">
		<li><a href="index.php">Home</a></li>
		<li><a href="customer.php">Customer</a></li>
		<li><a href="new-order.php">New Order</a></li>
		<li><a href="order-history.php">Order Report</a></li>
		<li><a href="report.php">Income</a></li>
	</ul>
</div><!--end menu-->
</div>
</div>
<div id="wrapper-form-1">
		<?php
			$cus_id  = $_GET['cus_id'];
			$sql   = "select * FROM customer WHERE cus_id = '$cus_id' ";
			$query = mysql_query($sql) or die(mysql_error().": $sql");
			$row   = mysql_fetch_array($query);		
		
		?>
		<form action="edit-customer-save.php" method="post" name="form1">
			<div class="idealWrap">
				<label>Customer ID:</label>
				<input name="cus-id" type="text" id="cus-id" value="<?php echo $row['cus_id']?>" disabled="disabled"/>
			</div>
			
			<div class="idealWrap">
				<label>Customer Name:</label>
				<input name="cus-name" type="text" id="cus-name" value="<?php echo $row['customer_name']?>"/>
			</div>
			
			
			<div class="idealWrap">
				<label>Address:</label>
				<input name="address" type="text" id="address" value="<?php echo $row['customer_address']?>"/>
			</div>
	
			<div class="idealWrap">
				<label>Telephone:</label>
				<input name="tel-number" type="text" id="tel-number" value="<?php echo $row['customer_tel']?>"/>
			</div>	
	
			<div class="idealWrap">
				<label>Shipping Address :</label>
				<textarea name="shipping" id="shipping"><?php echo $row['shipping_address']?></textarea>
			</div>	
			
			<div class="idealWrap">
				<label>&nbsp;</label>
				<input type="hidden" name="cus_id" id="cus_id" value="<?php echo $cus_id?>" />
				<input type="submit" value="Submit"/>
			</div>

					
		</form>
</div>


</body>
</html>