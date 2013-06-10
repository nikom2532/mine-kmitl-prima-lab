<?php
	function checklogin($ses_user)
	{	
		if(!isset($ses_user))
		{
		exit("<script>alert('Please Login');window,location='login.php';</script>");
		}
	}
