<?php
	$host 	= "localhost";
	$user 	= "iming";
	$pass 	= "iming";
	$dbname = "KMITL_prima_lab";
	@mysql_connect($host,$user,$pass) or die("Can't connect DB");
	mysql_select_db($dbname) or die("Can't select DB");
	mysql_query("set names utf8");
?>
