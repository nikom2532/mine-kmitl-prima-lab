<?php 
include("inc/connect.php");
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Report Income</title>
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
<div id="wrapper-form-1">
		<form action="report-result.php" method="post" name="form1">
		<div class="idealWrap">
			<label>Customer:</label>
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
			</div>
			<div class="space"></div>		
			<div class="idealWrap">
				<label>Group by:</label>
				<select id="month" name="month" title="Select">
				<option value= "01" selected="selected">January</option>
				<option value= "02">February</option>
				<option value= "03">March</option>
				<option value= "04">April</option>
				<option value= "05">May</option>
				<option value= "06">June</option>
				<option value= "07">July</option>
				<option value= "08">August</option>
				<option value= "09">September</option>
				<option value= "10">October</option>
				<option value= "11">November</option>
				<option value= "12">December</option>
				</select>
			</div>
			<div class="space"></div>			
			<div class="idealWrap">
				<label>&nbsp;</label>
				<input type= "submit" name="submit" value="Search">
			</div>					
		</form>
	</div>
</body>
</html>