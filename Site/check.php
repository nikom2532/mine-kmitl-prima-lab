<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Untitled Document</title>
</head>

<body>
<?php
	include("inc/connect.php");
	$user	= $_POST['username'];
	$pass	= $_POST['password'];
	
	$sql 	= "select * from admin
				where username='$user' and password='$pass'";
	$query	= mysql_query($sql)or die(mysql_error());
	$num	= mysql_num_rows($query);
	if($num==0)
	{
		exit("<script>alert('LOGIN FAIL');history.back();</script>");
	}else
	{
		$_SESSION['username']=$user;
		exit("<script>window.location='index.php';</script>");
	}
?>

</body>
</html>