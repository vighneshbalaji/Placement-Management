<?php
	session_start();
	
	require("database/connection.php");
	require("php/randomstring.php");
	require("database/forgetpasswrddatabase.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Placement Details - AICTE</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1, minimum-scale=1.0, maximum-scale=1, user-scalable=no">

<!-- Bootstrap & jQuery (js,css) -->

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
<script src="js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- External CSS & JS -->
<link rel="stylesheet" href="css/placement.css" />
<script src="js/placement.js"></script>

</head>
<body class="mainpage-body">

<?php require("sidenavpanel.php"); ?>
<?php require("alerts.php"); ?>

<?php 
	if($forgetpasswrdflg == 1)
	{
		echo "<script type='text/javascript'> alertBoxInStuUpdate('Password reset is sent to mail address. Please check it.'); </script>";
	}
	else if($forgetpasswrdflg == -1)
	{
		echo "<script type='text/javascript'> alertBoxInStuUpdate('Sorry Mail-ID is incorrect.'); </script>";
	}
?>

<!-- This Div for Side Navigation -->
<div id="main" class="mainpage">

	<!-- Mainpage Navbar -->
	<?php require("navbar.php"); ?>
	
	<!-- Students Update Panel -->
	<?php require("forgetpasswrdpanel.php"); ?>
	
</div>
</body>
</html>