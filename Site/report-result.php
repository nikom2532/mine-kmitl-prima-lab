<?php 
include("inc/connect.php");
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Income Result</title>
<link href="css/reset.css" rel="stylesheet" type="text/css" />
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
			<a href="report.php"><input type="button" name="button" value="Back" /></a>
			</form>
</div>		
	<table>
		<tr>
			<th>Customer</th>
			<th>Total Income</th>	
		</tr>
	<?php
	$customer	=	$_POST['customer'];
	$month		=	$_POST['month'];
	if($month =='January'){
			$month='01';
	}else if($month =='February'){
			$month='02';
	}else if($month =='March'){
			$month='03';		
	}else if($month =='April'){
			$month='04';		
	}else if($month =='May'){
			$month='05';
	}else if($month =='June'){
			$month='06';		
	}else if($month =='July'){
			$month='07';		
	}else if($month =='August'){
			$month='08';
	}else if($month =='September'){
			$month='09';
	}else if($month =='October'){
			$month='10';	
	}else if($month =='November'){
			$month='11';
	}else{
			$month='12';
					
	}
	
	/*
	$sql = "
	SELECT o.Date
	from orders o
	where o.Date='$customer'
	group by o.Date";
	$query  = mysql_query($sql) or die(mysql_error());
	while($row 	= mysql_fetch_array($query))
	{
		$str_time[] = $row["Date"];
	}
	*/
	
	/*
	$sql = "
	SELECT o.customer_name, sum(price*qty) as total
	from orders o
	left join order_detail od
	on o.order_id = od.order_id
	where o.customer_name='$customer'
	group by o.Date like '%-$month-%'";
	//echo "$customer<br>$month";
	*/
	$sql = "
	SELECT o.customer_name, sum(price*qty) as total
	from orders o
	left join order_detail od
	on o.order_id = od.order_id
	where o.customer_name='$customer'
	AND MONTH(o.Date) = '$month'
	group by MONTH(o.Date) ";

	$query  = mysql_query($sql) or die(mysql_error());
	$row 	= mysql_fetch_array($query);
	?>
		<tr>
			<td><?php echo $row['customer_name']?></td>
			<td><?php echo $row['total']?></td>
		</tr>
	
	</table>	

</div>


</body>
</html>
