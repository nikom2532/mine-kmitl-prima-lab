<?PHP
	session_start();
	include("inc/connect.php");
	$act = $_REQUEST['act'];
	if($act == 'add' && !empty($_GET['product_id']))
	{
		if(	isset($_SESSION['order'][$_GET['product_id']])){//$SESSION["var"]["1"] 
			$_SESSION['order'][$_GET['product_id']]++;
			}
			else
		$_SESSION['order'][$_GET['product_id']] = 1;// create session and keep data in array , 1
	}
	if($act == 'remove')
	{
		unset($_SESSION['order'][$_GET['product_id']]);// cannot use destroy cause it will destroy all session like member session
	}
	if($act == 'update')
	{
		foreach($_POST['qty'] as $product_id=>$qty){
			$_SESSION['order'][$product_id]=$qty;
			}
	}
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
		/* For 
		ing the last border */
		$("table td:last-child, table th:last-child").addClass("last");
});
 function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; 
  document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
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
			<li><a href="product.php?category_id=<?php echo $rowc['category_id']; ?>"></a><a href="product.php?category_id=<?php echo $rowc['category_id']; ?>"><?php echo $rowc['category_name'];?></a></li>
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
	<?php //print_r($_SESSION['order']); ?>&nbsp;
	<form id="form1" name="form1" method="post" action="?act=update">
	<table width="1079">
	
	<tr>
		<th width="45%">Product</th>
		<th width="28%">Price</th>
		<th>Quantity</th>
		<th>Total</th>
		<th>Remove</th>
	</tr>
		<?php 
 			if(sizeof($_SESSION['order'])>0){
				$total = 0;
				foreach($_SESSION['order'] as $product_id=>$qty){
					$sql = "select * from product where product_id =$product_id";
					$query = mysql_query($sql) or die (mysql_error());
					$row = mysql_fetch_array($query);
					$sum = $row['price']*$qty;
					$total += $sum;
		?>
   		<tr>
			<td><?php echo $row['product_name']?></td>
			<td><?php echo $row['price']?></td>
			<td width="27%"><input type="text" size="2"name="qty[<?php echo $product_id ?>]" value="<?php echo $qty ?>" /></th>
			<td><?php echo $sum ?></td>
			<td width="27%"><a href="?product_id=<?php echo $product_id?>&act=remove">Remove</a></th>		
			</tr>
    	<?php }?>
		<tr>
			<td height="85" colspan="3" bgcolor="#CCCCCC"><strong>TOTAL</strong></td>
			<td align="right" bgcolor="#CCCC99"><?php echo $total ?></td>
			<td bgcolor="#CCCCCC">&nbsp;</td>
		 </tr>
		<tr>
		<td colspan="5"><input type="submit" name="update" id="update" value="Update" />

		  <input name="confirm" type="button" id="confirm" onclick="MM_goToURL('parent','confirm.php');return document.MM_returnValue" value="Confirm" />
	
		</td>
		</tr>
	   <?php
	  	}else{
			echo '<tr>
				<td align="center" colspan="5" bgcolor="#FFCCCC">No order</td></tr>';
		  }
	   ?>	
	</table>
	
	</form>
</div>



</body>
</html>