 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
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
</script></head>

<body>
	<div id="wrapper-box">
		<div id="wrapper-logo"></div>
		<div id="wrapper-login">
				<div id="title-login"><strong>
				Log in
				</strong></div>
				<div id="login-form">
					<form method="post" action="check.php">
						<div class="form-in-1">
								<div class="title left" >
									Username 
						</div>
								<div class="text-box left">
									<input name="username" type="text" size="35" />
								</div>
								<div class="title left" >
									Password 
						</div>
								<div class="text-box left">
									<input name="password" type="password" size="35" />
								</div>
								<div class="title left" >
								</div>
								<div class="text-box left">
									<input name="submit" type="submit" value="Log in" />
								</div>
								
								
						</div><!--end form-in-1 -->
					</form>
				</div>
		</div><!--end wrapper-login -->
	</div><!--end wrapper-box-->
</body>
</html>