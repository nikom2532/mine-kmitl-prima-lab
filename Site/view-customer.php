<?php 
session_start();
include("inc/connect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Customer Profile</title>
<link href="css/reset.css" rel="stylesheet" type="text/css"/>
<link href="css/mian.css" rel="stylesheet" type="text/css" />


<script type="text/javascript" src="js/mootools-core-1.3.2-full-compat-yc.js"></script>
<script type="text/javascript" src="js/menu.js"></script>

<link href="css/idealForms/idealForms.css" rel="stylesheet" type="text/css" media="screen"/> 
<link href="css/idealForms/idealForms-theme-sapphire.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="css/table.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="js/modernizr-1.6.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery-idealForms.js"></script>
<script type="text/javascript" src="js/scripts.js"></script>
<script type="text/javascript">
 $(function() {
		/* For zebra striping */
        $("table tr:nth-child(odd)").addClass("odd-row");
		/* For cell text alignment */
		$("table td:first-child, table th:first-child").addClass("first");
		/* For removing the last border */
		$("table td:last-child, table th:last-child").addClass("last");
});
</script>

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
<?php }?>
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
   				$sql   = "select * FROM customer where cus_id = '$cus_id'";
   				$query = mysql_query($sql) or die(mysql_error().": $sql");
   				$row   = mysql_fetch_array($query);		
		
		?>
		<form name="form1"method="post">
			<div class="idealWrap">
			<label>ID:</label>
			<input type="text" id="cus_id" name="cus_id" value="<?php echo $row['cus_id']?>" disabled="disabled"/>
			</div>

			<div class="idealWrap">
			<label>Name:</label>
			<input type="text" id="customer_name" name="customer_name" value="<?php echo $row['customer_name']?>" disabled="disabled"/>
			</div>
			
			<div class="idealWrap">
			<label>Address:</label>
			<input type="text" id="customer_address" name="customer_address" value="<?php echo $row['customer_address']?>" disabled="disabled"/>
			</div>
			
			<div class="idealWrap">
			<label>Telephone:</label>
			<input name="customer_tel" id="customer_tel" type="text" value="<?php echo $row['customer_tel']?>" disabled="disabled"/>
			</div>
			
			<div class="idealWrap">
			<label>Shipping Address:</label>
			<input name="shipping_address" id="shipping_address" type="text" value="<?php echo $row['shipping_address']?>" disabled="disabled"/>
			</div>
			
			<div class="idealWrap">
				<label>&nbsp;</label>
				<a href="customer.php"><input type="button" name="button" id="button" value="Back"/></a>
				
			</div>	
	
	</form>
</div>

</body>
</html>