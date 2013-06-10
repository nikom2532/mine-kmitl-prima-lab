<?php
	session_start();
	session_destroy();// clear session
	exit("<script>window.location = 'login.php';</script>");

?>