<?php 
session_start();
include("inc/connect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Prima Lab</title>
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


<div id="content">
	<div id="wrapper-add-btn">
	<div class="idealWrap">
			<form name="form1" action="">
			<a href="new-product.php"><input type="button" name="button" value="Add Product" /></a>
			</form>
	</div>	
	</div>
	<div id="wrapper-link">
	<?php
		$sql = "select * from product left join category on product.category_id = category.category_id order by product.category_id ASC";
		$query  = mysql_query($sql) or die (mysql_error().":$sql");
		$num    = mysql_num_rows($query);

	//$var 	= condition?T:F;
	$page		= !empty($_GET['page'])?$_GET['page']:1;
	$perpage	= 10;
	$totalpage	= ceil($num/$perpage);
	//echo $totalpage;
	$startpoint	= ($page-1)*$perpage;

	$sql 	.= " limit $startpoint,$perpage";
	$query	= mysql_query($sql) or die(mysql_error()); 
	$num	= mysql_num_rows($query);

   if($totalpage > 1)
  {  
   
		if($page > 1)
			echo "<a href=?page=".($page-1).">&lt;&lt;&nbsp;Back</a>&nbsp;&nbsp;";
			
		$start 	= ($page-2 < 1)?1:$page-2;
		$end	= ($page+2 > $totalpage)?$totalpage:$page+2;
		
	  	for($i=$start;$i<=$end;$i++)
		{	
			if($i==$page)
				echo "<font color=\"#000\">[<b>$i</b>]</font>&nbsp;&nbsp;";
			else
				echo "<a href=?page=$i>$i</a>&nbsp;&nbsp;";
		}
		
		if($page < $totalpage)
		echo "<a href=?page=".($page+1).">Next&nbsp;&gt;&gt;</a>&nbsp;&nbsp;";
   }
	  ?>
	 </div>
    <table cellspacing="0">
    	<tr>
			<th>Category</th>
			<th>Product name</th>
			<th>Price</th>
			<th>Edit</th>	
			<th>Delete</th>
			<th>View</th>			
		</tr>
		<?php 
			
			for($i=1;$i<=$num;$i++)
			{
			  $row = mysql_fetch_array($query);
		?>
   		<tr>
			<td><?php echo $row['category_name']?></td>
			<td><?php echo $row['product_name']?></td>
			<td><?php echo $row['price']?></td>
			<td><a href="edit-product.php?product_id=<?php echo $row['product_id']; ?>">Edit</a></th>	
			<td><a href="delete-product.php?product_id=<?php echo $row['product_id']?>" onclick="return confirm('Are you sure to delete??');">Delete</a></th>
			<td><a href="view-product.php?product_id=<?php echo $row['product_id']; ?>">View</a></th>	
		
		</tr>
    	<?php }?>
    </table>
	
  

</div>


</body>
</html>