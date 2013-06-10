<?PHP
	session_start();
	include("inc/connect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Confirm Order</title>
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
<script language="javascript">
	function chkdata(){
		/*
		if(document.frm.name.value ==''){
			alert('Please input name');
			document.frm.name.focus();
			return false;// same meaning with exit()
		}
		if(document.frm.address.value ==''){
			alert('Please input address');
			document.frm.address.focus();
			return false;
		}
		if(document.frm.phone.value ==''){
			alert('Please input phone');
			document.frm.phone.focus();
			return false;
		}*/
		str = '';
		if(document.frm.name.value ==''){
			str += 'Please input name\n';
		}
		if(document.frm.address.value ==''){
			str += 'Please input address\n';
		}
		if(document.frm.phone.value ==''){
			str += 'Please input phone\n';
		}
		if(str !=''){
			alert(str);
			return false;		
		}
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
			<li><a href="new-order.php?category_id=<?php echo $rowc['category_id']; ?>"><?php echo $rowc['category_name'];?></a></li>
		<?php 
			}
		?>
	</ul>
</div>

<div id="wrapper-product">

	<table width="1079">
	
	<tr>
		<th width="45%">Product</th>
		<th width="28%">Price</th>
		<th>Quantity</th>
		<th>Total</th>
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
			<td width="27%"><?php echo $qty ?></th>
			<td><?php echo $sum ?></td>	
		</tr>
    	<?php }?>
		<tr>
			<td colspan="3" bgcolor="#CCCCCC"><strong>TOTAL</strong></td>
			<td align="right" bgcolor="#CCCC99"><?php echo $total ?></td>
		</tr>
	  <?php
  		}else{
				echo '<tr>
					<td align="center" colspan="5" bgcolor="#FFCCCC">Cart is empty</td></tr>';
	  	}
   	 ?>		
	</table>	
	<br/>
	<form id="frm" name="frm" method="post" action="saveorder.php" onsubmit="return chkdata();">
	<table>
		<tr>
			<th colspan="4">Delivery Information</th>
		</tr>
		<tr>			
			<td>Customer</td>			
			<td colspan="3">
			<select id="customer" name="customer" title="Select">
			 <?php
				$sqlc 	= "select * from customer order by cus_id asc";
				$queryc	= mysql_query($sqlc)  or die(mysql_error());
				$numc	= mysql_num_rows($queryc);
				for($i=1;$i<=$numc;$i++)
				{	
					$rowc = mysql_fetch_array($queryc);
			 ?>
				<option value="<?php echo $rowc['cus_id']?>"><?php echo $rowc['customer_name']?></option>
				 <?php
				}
	  			 ?>
			</select>		
			</td>	
		</tr>
		<tr>
			<td>Address</td>
			<td colspan="2"><textarea name="address"id="address" cols="45" rows="5"></textarea></td>	
		</tr>
		<tr>
			<td align="center">Phone</td>
			<td colspan="2"><input type="text" name="phone" id="phone" /></td>	
		</tr>
		<tr>
			<td colspan="5" align="center" bgcolor="#FFCCCC"><input type="submit" name="save" id="save" value="Save" /></td>
		</tr>
				
	
	</table>

	</form>
</div>

</body>
</html>