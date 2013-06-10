<?PHP
	session_start();
	include("inc/connect.php");
	
	$date ="now()";
	$name = $_POST['customer'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	
	$sql = "select * from customer c where c.customer_name = '$name' ";
	$query= mysql_query($sql) or  die (mysql_error());
	$rowc = mysql_fetch_array($query);
	$cus_id = $rowc['cus_id'];
	//echo "$cus_id"; 
	//echo "$date";
	// Save data to orders
	$sql = "INSERT INTO `orders`"
	       . " (order_id,Date, customer_name, phone,address, cus_id)"
		   . " VALUES(null,$date,'$name','$phone', '$address','$cus_id')";
	mysql_query($sql) or die (mysql_error(). "<br />" . $sql);
	
	// Get last ID- last o_id
	$order_id = mysql_insert_id();//Get the lastest auto increment id
	
	// Save data to order_detail
	foreach($_SESSION['order'] as $product_id=>$qty){
		
		// get price from table product 
		$sql = "select * from product where product_id = $product_id";
		$query = mysql_query($sql) or  die (mysql_error());
		$row = mysql_fetch_array($query);
		$price = $row['price'];
		
		$sql2 = "insert into order_detail values ('$product_id','$price','$qty','$order_id')";
		mysql_query($sql2) or die (mysql_error());
		}
		
		// delete order from cart
		
		unset($_SESSION['order']);
		exit("<script>alert('New order is saved');window.location='order-history.php';</script>");
?>

