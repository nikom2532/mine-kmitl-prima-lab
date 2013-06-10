<?php 
include("inc/connect.php");
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>New Order</title>
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
		<?php
			$sqlc 	= "select * from category order by category_id asc";
			$queryc	= mysql_query($sqlc)  or die(mysql_error());
			$numc	= mysql_num_rows($queryc);
		?>		
<div id="side-menu">
	<ul>
		<?php
		for($i=1;$i<=$numc;$i++)
			{	
				$rowc = mysql_fetch_array($queryc);
		?>
			<li><a href="new-order.php?category_id=<?php echo $rowc['category_id']; ?>"><?php echo $rowc['category_name'];?></a></li>
		<?php 
			}
		?>
	</ul>
</div>
	<?php
		$str = "";
		$str .= !empty($_GET['category_id'])?" and category_id ={$_GET['category_id']}":"";
		$sql = "select * from product  
				natural join category
				where 1=1 $str 
				order by product_id asc";// join with table category to get category name
		//echo $sql;
		$query = mysql_query($sql) or die(mysql_error());
		$num = mysql_num_rows($query);// no. of row
	
	?>
<div id="wrapper-product">

	<table width="1079">
	<tr>
		<th width="45%">Product</th>
		<th width="28%">Price</th>
		<th>Order</th>
	</tr>
	
	<?php 
			
			for($i=1;$i<=$num;$i++)
			{
			  $row = mysql_fetch_array($query);
		?>
   		<tr>
			<td><?php echo $row['product_name']?></td>
			<td><?php echo $row['price']?></td>
			<td width="27%"><a href="order.php?product_id=<?php echo $row['product_id'] ?>&act=add">Order</a></th>	
		
		</tr>
    	<?php }?>	
	</table>
	
	
</div>



</body>
</html>