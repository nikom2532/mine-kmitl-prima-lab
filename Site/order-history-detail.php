<?php 
session_start();
include("inc/connect.php");
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
<div id="content">
	<div class="idealWrap">
			<form name="form1" action="">
			<a href="order-history.php"><input type="button" name="button" value="Back" /></a>
			</form>
	</div>
    <table cellspacing="0">
    	<tr>
			<th colspan="4" align="center">Delivery Information</th>		
		</tr>
		<?php 
			
			$order_id  = $_GET['order_id'];
			$sql = "select * from orders  WHERE order_id = '$order_id' ";
			$query  = mysql_query($sql) or die (mysql_error().":$sql");
			$num    = mysql_num_rows($query);
						
			for($i=1;$i<=$num;$i++)
			{
			  $row = mysql_fetch_array($query);
		?>
   		<tr>
			<td>Date</td>
			<td><?php echo date("j F Y",strtotime($row['Date'])) ?></td>
		</tr>
		<tr>
			<td>Customer Name</td>
			<td><?php echo $row['customer_name']?></td>
		</tr>
		<tr>
			<td>Address</td>
			<td><?php echo $row['address']?></td>
		</tr>
		<tr>
			<td>Phone</td>
			<td><?php echo $row['phone']?></td>
		</tr>
    	<?php }?>
    
	</table>
	
	<table cellspacing="0">
    	<tr>
			<th colspan="4" align="center">Product Information</th>		
		</tr>
   		<tr>
			<td>Product Name</td>
			<td>Price</td>
			<td>Quantity</td>
			<td>Total</td>
		</tr>
	
 		<?php 				
				$sql = "select * from order_detail left join product on order_detail.product_id = product.product_id where order_id = '$order_id'";		 
		 		$query  = mysql_query($sql);
				$num    = mysql_num_rows($query);
				for($i=1;$i<=$num;$i++)
				{
			  		$row = mysql_fetch_array($query);
					$sum = $row['price']*$qty;
					$total += $sum;
				?>
		<tr>
			<td><?php echo $row['product_name']?></td>
			<td><?php echo $row['price']?></td>
			<td><?php echo $row['qty']?></td>
			<td><?php echo $row['qty']*$row['price']?></td>
		</tr>
		<?php }?>
  		<?php
			$sqls = "select sum(price*qty) as total from order_detail where order_id = '$order_id'";	
			$query  = mysql_query($sqls);
			$row = mysql_fetch_array($query);
	
		?>
				
		<tr>
			<th colspan="3">TOTAL</th>
			<th><?php echo $row['total']?></th>
		</tr>
	</table>
</div>


</body>
</html>