<?php 
include("inc/connect.php");
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/reset.css" rel="stylesheet" type="text/css"/>
<link href="css/mian.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="js/mootools-core-1.3.2-full-compat-yc.js"></script>
<script type="text/javascript" src="js/menu.js"></script>

<link href="css/idealForms/idealForms.css" rel="stylesheet" type="text/css" media="screen"/> 
<link href="css/idealForms/idealForms-theme-sapphire.css" rel="stylesheet" type="text/css" media="screen"/>


<script type="text/javascript" src="js/modernizr-1.6.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
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
			 	$p_id  = $_GET['product_id'];
   				$sql   = "select * FROM product WHERE product_id = '$p_id' ";
   				$query = mysql_query($sql) or die(mysql_error().": $sql");
   				$row   = mysql_fetch_array($query);		
		
		?>
		
		<form name="form1" action="edit-product-save.php" method="post">
			<div class="idealWrap">
			<label>Product ID:</label>
			<input type="text" id="product_name" name="product_name" value="<?php echo $row['product_id']?>" disabled="disabled"/>
			</div>
			<div class="idealWrap">
			<label>Category:</label>
			<select id="category" name="category" title="Select">
			 <?php
				$sqlc 	= "select * from category order by category_id asc";
				$queryc	= mysql_query($sqlc)  or die(mysql_error());
				$numc	= mysql_num_rows($queryc);
				for($i=1;$i<=$numc;$i++)
				{	
					$rowc = mysql_fetch_array($queryc);
			 ?>
				<option value="<?php echo $rowc['category_name']?>" <?php if($row['category_name']==$rowc['category_name']){echo 'selected="selected"';}?>><?php echo $rowc['category_name']?></option>
				 <?php
				}
	  			 ?>
			</select>
			</div>
			
			<div class="idealWrap">
			<label>Product Name:</label>
			<input type="text" id="product_name" name="product_name" value="<?php echo $row['product_name']?>"/>
			</div>
			
			<div class="idealWrap">
			<label>Price:</label>
			<input name="product_price" id="product_price" type="text" value="<?php echo $row['price']?>"/>
			</div>
			
			<div class="idealWrap">
				<label>&nbsp;</label>
				<input type="hidden" name="product_id" id="product_id" value="<?php echo $p_id?>" />
				<input type="submit" name="button" id="button" value="Submit" />
				
			</div>	
	
	</form>
</div>

</body>
</html>